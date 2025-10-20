<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateLifeMottosAndInterpretationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('life_mottos_and_interpretations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        DB::table('life_mottos_and_interpretations')->insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Бороться и искать, найти и не сдаваться!',
                'description' => 'Проявление настойчивости, достижение поставленных целей с максимально качественным результатом.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Всегда вперед!',
                'description' => 'Стремление к получению нового опыта и непрерывному саморазвитию.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Спешу делать добро!',
                'description' => 'Готовность к сотрудничеству и взаимопомощи. Способность подчинить свои интересы целям команды.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Оставь после себя хорошее!',
                'description' => 'Ориентация на достижение общественно полезного результата. Умение находить компромиссы в конфликтных ситуациях.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Век живи, век учись!',
                'description' => 'Быстрое включение в контекст новой ситуации, адаптивность.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Счастье – это дело судьбы, ума и характера!',
                'description' => 'Умение брать на себя ответственность, самостоятельно делать выбор.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Наслаждайся жизнью!',
                'description' => 'Оптимист, «душа компании», стремление получать удовольствие.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Ищи место под солнцем!',
                'description' => 'Самостоятельность, социальная активность, поиск лучшего.',
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
        Schema::dropIfExists('life_mottos_and_interpretations');
    }
}
