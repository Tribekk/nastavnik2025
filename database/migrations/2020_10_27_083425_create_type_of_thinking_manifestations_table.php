<?php

use Domain\Quiz\Models\TypeOfThinking;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateTypeOfThinkingManifestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_thinking_manifestations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('type_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('value_range');
            $table->timestamps();

            $table->foreign('type_id')
                ->references('id')
                ->on('type_of_thinking')
                ->onDelete('cascade');
        });

        $typePD = TypeOfThinking::where('short_title', 'П-Д')->firstOrFail();
        $typeAS = TypeOfThinking::where('short_title', 'А-С')->firstOrFail();
        $typeSL = TypeOfThinking::where('short_title', 'С-Л')->firstOrFail();
        $typeNO = TypeOfThinking::where('short_title', 'Н-О')->firstOrFail();
        $typeK = TypeOfThinking::where('short_title', 'К')->firstOrFail();

        $typePD->manifestations()->createMany([
            [
                'uuid' => Str::uuid(),
                    'title' => 'Степень проявленности: &laquo;Мастер&raquo;',
                'description' => 'Это предполагают интерес к технике, хороший интеллект, память, внимательность, выносливость,
                    готовность не только освоить новые технические процессы, но и довести его до совершенства,
                    затем передать опыт другим.<br>Мастер обладает  конструктивным логическим мышлением.',
                'value_range' => '5-5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Степень проявленности: &laquo;Человек дела&raquo;',
                'description' => 'Это предполагают интерес к технике, хороший интеллект, память, внимательность, выносливость,
                    готовность не только освоить новые технические процессы, но и довести его до совершенства,
                    затем передать опыт другим.<br>Мастер обладает  конструктивным логическим мышлением.',
                'value_range' => '3-4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Тип мышления не выражен',
                'description' => '',
                'value_range' => '0-2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $typeAS->manifestations()->createMany([
            [
                'uuid' => Str::uuid(),
                'title' => 'Степень проявленности: &laquo;Эрудит&raquo;',
                'description' => 'Такой человек достигает успехов в решении логических задач, головоломок, может прогнозировать решение.<br>
                    Обладает аналитическим умом,  способностью проектирования и конструирования.',
                'value_range' => '5-5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Степень проявленности: &laquo;Мыслитель&raquo;',
                'description' => 'Такой человек легко и точно овладевает навыками вычисления, измерения, счета, объединения объектов в группы.',
                'value_range' => '3-4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Тип мышления не выражен',
                'description' => '',
                'value_range' => '0-2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $typeSL->manifestations()->createMany([
            [
                'uuid' => Str::uuid(),
                'title' => 'Степень проявленности: &laquo;Стратег&raquo;',
                'description' => 'Такой человек  отсекает лишнее, моделирует ситуацию, как с реальными объектами и ситуациями, так и с вымышленными.',
                'value_range' => '5-5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Степень проявленности: &laquo;Человек дела&raquo;',
                'description' => 'Такой человек способен выявлять закономерности и точно вербально обобщать информацию.',
                'value_range' => '3-4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Тип мышления не выражен',
                'description' => '',
                'value_range' => '0-2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $typeNO->manifestations()->createMany([
            [
                'uuid' => Str::uuid(),
                'title' => 'Степень проявленности: &laquo;Координатор&raquo;',
                'description' => 'Такой человек обладает высокой степенью оригинальности и абстрактности работы.<br>
                    При выполнении задания может устанавливать непривычные сочетания предметов и их свойств.<br>
                    Способен легко заучивать тексты, за счет фотографической памяти, путем запечатления образов.',
                'value_range' => '5-5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Степень проявленности: &laquo;Человек дела&raquo;',
                'description' => 'Такой человек  способен видеть практически любую проблему, как картинку и достраивать её недостающие элементы (как пазлы). Это помогает быстро и эффективно решать различные жизненные задачи.',
                'value_range' => '3-4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Тип мышления не выражен',
                'description' => '',
                'value_range' => '0-2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $typeK->manifestations()->createMany([
            [
                'uuid' => Str::uuid(),
                'title' => 'Степень проявленности: &laquo;Гений&raquo;',
                'description' => 'Высшая степень интеллектуального или творческого развития человека, позволяет делать научные открытия,
                    предлагать новые концепции, создавать великие произведения искусства.<br>
                    Такой человек проявляет творческое отношение к работе.',
                'value_range' => '5-5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Степень проявленности: &laquo;Талант&raquo;',
                'description' => 'Основные черты такого человека  - гибкость, поиск новых целей, путей и решений.',
                'value_range' => '3-4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Тип мышления не выражен',
                'description' => '',
                'value_range' => '0-2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_of_thinking_manifestations');
    }
}
