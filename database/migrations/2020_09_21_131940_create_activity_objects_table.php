<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_objects', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->text('description');
        });

        $activityObjects = [];

        foreach ($this->getActivityObjectsInfo() as $item) {
            $activityObjects[] = [
                'uuid' => Str::uuid(),
                'title' => $item['title'],
                'description' => $item['description'],
            ];
        }

        DB::table('activity_objects')->insert($activityObjects);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_objects');
    }

    /**
     * Информация обо всех объектах деятельности
     *
     * @return array
     */
    private function getActivityObjectsInfo(): array
    {
        return [
            [
                'title' => 'Человек',
                'description' => 'дети, взрослые, сотрудники студенты, клиенты, пассажиры, зрители, читатели, пациенты, покупатели и т.д.',
            ],
            [
                'title' => 'Информация',
                'description' => 'тексты, формулы, схемы, коды, чертежи, иностранные языки, языки программирования и т.д.',
            ],
            [
                'title' => 'Финансы',
                'description' => 'деньги, акции, фонды, лимиты, кредиты и т.д.',
            ],
            [
                'title' => 'Техника',
                'description' => 'машины, механизмы, станки, здания, конструкции, приборы, транспорт и т.д.',
            ],
            [
                'title' => 'Искусство',
                'description' => 'кино, живопись, скульптура, литература, музыка, декор, театр, балет и т.д.',
            ],
            [
                'title' => 'Животные',
                'description' => 'служебные, дикие, домашние, промысловые и т.д.',
            ],
            [
                'title' => 'Растения',
                'description' => 'сельскохозяйственные, декоративные, дикорастущие и т.д.',
            ],
            [
                'title' => 'Еда и лекарства',
                'description' => 'мясо, рыба, молоко, кондитерские и хлебобулочные изделия, бакалея, консервы, плоды, овощи, фрукты, биологически активные добавки, лекарства и т.д.',
            ],
            [
                'title' => 'Изделия',
                'description' => 'металл, ткани, мех, кожа, дерево, камень и т.д.',
            ],
            [
                'title' => 'Природные ресурсы',
                'description' => 'земли, леса, горы, водоемы, месторождения, среда обитания, солнечная энергия, энергия ветра и воды, вторсырье, минералы и т.д.',
            ],
        ];
    }
}
