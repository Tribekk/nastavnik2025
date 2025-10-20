<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FixStylesProfessionalTypesPolitType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('professional_types')
            ->where('title', 'Политический тип')
            ->update([
                'description' => '<p>Характеризуется умением найти применение любой вещи, получить выгоду из&nbsp;происходящих событий. Представители данного типа умеют успешно вести бизнес и&nbsp;неплохо проявляют себя в&nbsp;политической сфере, но&nbsp;не&nbsp;склонны к&nbsp;фантазиям и&nbsp;мечтательности. </p>
                                    <p>Черты, по&nbsp;которым можно определить <span class="font-weight-bold">политический тип</span>: </p>
                                    <ul class="px-5">
                                    <li>предметное мышление; </li>
                                    <li>последовательное выполнение операций; </li>
                                    <li>бережливость; </li>
                                    <li>упорное достижение целей; </li>
                                    <li>ориентированность во&nbsp;многих жизненных сферах: политике, экономике, управлении; </li>
                                    <li>быстрое привыкание к&nbsp;переменам.</li>
                                    </ul>
                                    <p><span class="font-weight-bold">Основные компетенции:</span> способность обрабатывать большие объемы цифровых (финансовых данных), точность расчетов, внимательность к&nbsp;мелочам; стратегическое мышление, амбициозность</p>',
            ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
