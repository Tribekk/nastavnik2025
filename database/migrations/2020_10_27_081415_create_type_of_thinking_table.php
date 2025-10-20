<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateTypeOfThinkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_thinking', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('short_title');
            $table->string('title');
            $table->string('who_is_it');
            $table->text('description');
            $table->string('hex_color');
            $table->timestamps();
        });

        DB::table('type_of_thinking')->insert([
            [
                'uuid' => Str::uuid(),
                'short_title' => 'П-Д',
                'title' => 'Предметно-действенное мышление',
                'who_is_it' => 'свойственно людям дела',
                'description' => 'Про них говорят: &laquo;Золотые руки!&raquo;<br>
                    Они лучше усваивают информацию через действие, обычно, обладают хорошей координацией движений.<br>
                    Их&nbsp;руками создан весь окружающий нас предметный мир - без них невозможно реализовать самую блестящую идею.',
                'hex_color' => "#4FD22E",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'short_title' => 'А-С',
                'title' => 'Абстрактно-символическое мышление',
                'who_is_it' => 'свойственно новаторам и изобретателям',
                'description' => 'Они могут усваивать информацию с&nbsp;помощью математических кодов, формул и&nbsp;операций, которые нельзя ни&nbsp;потрогать, ни&nbsp;представить.<br>
                    Благодаря особенностям такого мышления на&nbsp;основе гипотез сделаны многие открытия во&nbsp;всех областях науки.<br>
                    Люди этого типа мышления вносят и&nbsp;внедряют прогрессивные идеи в&nbsp;рабочий процесс. Среди них: физики-теоретики, математики, экономисты, программисты, аналитики и&nbsp;другие.',
                'hex_color' => "#F3CB0C",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'short_title' => 'С-Л',
                'title' => 'Словесно-логическое мышление',
                'who_is_it' => 'отличает людей с ярко выраженным вербальным интеллектом',
                'description' => 'Благодаря развитому словесно-логическому мышлению ученый, преподаватель, переводчик,
                    писатель, филолог, журналист могут сформулировать свои мысли и&nbsp;донести их до&nbsp;людей.
                    Это умение необходимо руководителям, политикам и&nbsp;публичным людям и&nbsp;общественным деятелям.',
                'hex_color' => "#308FBE",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'short_title' => 'Н-О',
                'title' => 'Наглядно-образное мышление',
                'who_is_it' => 'отличает людей с художественным складом ума',
                'description' => 'Они могут представить и&nbsp;то, что было и&nbsp;то, что будет и&nbsp;то, чего никогда не&nbsp;было и&nbsp;не&nbsp;будет.<br>
                    Это художники, поэты, писатели, режиссеры, архитекторы, конструкторы, дизайнеры и&nbsp;т.п.',
                'hex_color' => "#7643E5",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'short_title' => 'К',
                'title' => 'Креативность',
                'who_is_it' => 'способность мыслить творчески, находить нестандартные решения задачи',
                'description' => 'Креативностью может обладать человек с&nbsp;любым типом мышления.<br>
                    Это редкое и&nbsp;ничем незаменимое качество, отличающие талантливых и&nbsp;успешных людей в&nbsp;любой сфере деятельности.',
                'hex_color' => "#BA34B1",
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
        Schema::dropIfExists('type_of_thinking');
    }
}
