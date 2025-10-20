<?php

namespace Domain\Repositories;

use Domain\UserProfile\Models\UserProfile as Model;

class UserProfileRepository extends CoreRepository
{

    protected function getModelClass() {
        return Model::class;
    }

    public function getForComboBox() {
        $columns=array(
            'id',
            'title'
        );

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id','DESC');

        //////   dd($result);
        return $result;
    }


    public function getAllWithPaginate() {
        $columns=array(
            'id',
            'title',
            'is_completed'
        );

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id','DESC')
            // ->with(['category','user'])

            ->paginate(25);

        //////   dd($result);
        return $result;
    }


    public function getEdit($id) {
        return $this->startConditions()->find($id);
    }
}

?>
