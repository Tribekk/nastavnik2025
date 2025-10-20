<?php

namespace Domain\Employer\Actions;

use Domain\User\Models\StageTestsAndConsultations;

class GetSelectedItemsSelect2ByStringValuesAction
{
    public function run(string $column, string $values)
    {
        $query = htmlspecialchars_decode($values);
        $query = str_replace(['&amp;', 'amp;'], '', $query);
        $query = str_replace(['&quot;', 'quot;'], '"', $query);
        $column = $column === 'class' ? 'class_id' : $column;

        $result = [];
        $items = explode(",", $query);

        foreach($items as $item) {
            $model = StageTestsAndConsultations::where($column, $item)->first();

            if ($model){
                if ($column === 'class_id'){
                    $result[] = ['id' => $item, 'title' => $model->class];
                }else{
                    $result[] = ['id' => $item, 'title' => $item];
                }
            }

        }

        return count($result) ? $result : null;
    }
}
