<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_kinds', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->text('description');
        });

        $activityKinds = [];

        foreach ($this->getActivityKindsInfo() as $item) {
            $activityKinds[] = [
                'uuid' => Str::uuid(),
                'title' => $item['title'],
                'description' => $item['description'],
            ];
        }

        DB::table('activity_kinds')->insert($activityKinds);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_kinds');
    }

    /**
     * Информация обо всех видах деятельности
     *
     * @return array
     */
    private function getActivityKindsInfo(): array
    {
        return [
            [
                'title' => 'Управление',
                'description' => 'руководство какой-то деятельностью',
            ],
            [
                'title' => 'Обслуживание',
                'description' => 'удовлетворение потребностей, уход, реализация процессов, перемещение, хранение, сбыт и т.д.',
            ],
            [
                'title' => 'Образование',
                'description' => 'воспитание и обучение, формирование личности',
            ],
            [
                'title' => 'Оздоровление',
                'description' => 'избавление от болезней, ремонт, предупреждение выхода из строя',
            ],
            [
                'title' => 'Творчество',
                'description' => 'создание чего-то по схеме или нового',
            ],
            [
                'title' => 'Производство',
                'description' => 'изготовление техники, продукции, строительство зданий, создание объектов',
            ],
            [
                'title' => 'Конструирование',
                'description' => 'проектирование деталей, зданий, объектов, систем, их свойств, разработка технологий',
            ],
            [
                'title' => 'Исследование',
                'description' => 'научное или прикладное изучение чего-либо или кого-либо',
            ],
            [
                'title' => 'Защита',
                'description' => 'охрана от враждебных действий, защита прав, предупреждение разрушения',
            ],
            [
                'title' => 'Контроль',
                'description' => 'проверка и наблюдение, соблюдение стандартов',
            ],
        ];
    }
}
