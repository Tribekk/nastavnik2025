<?php

namespace Support;

use Illuminate\Support\Collection;

trait HasTreeRelation
{
    /**
     * Функция возвращает коллекцию моделей ветки родителя
     * @param string $childRelation - hasMany связь которая возвращает дочерние модели текущей модели
     * @param null $parentId - по умолчанию берется текущий id модели
     * @return Collection - дочерние модели
     */
    public function parentChildren($childRelation = 'children', $parentId = null): Collection
    {
        $result = [];

        if (!$child = self::where('id', $parentId ?? $this->id)->with($childRelation)->get()) {
            return collect();
        }

        $this->getChild($child, $childRelation, $result);

        return collect($result);
    }

    /** функция записывает в $result id всех дочерних моделей текущего ребенка и проходится по дереву */
    private function getChild($child, $childRelation, &$result): void
    {
        foreach ($child as $item) {
            $result[] = $item;
            if(isset($item->$childRelation)) $this->getChild($item->$childRelation, $childRelation, $result);
        }
    }
}
