<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FixStylesCharacterTraitDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('character_traits')
            ->where('code', 'op')
            ->update(
                [

                    'lower_description' => '<p>Такой человек проявляет настороженность ко&nbsp;всему новому и&nbsp;неожиданному, тяжело меняет свои принципы и&nbsp;убеждения. Ему сложно ориентироваться в&nbsp;новых ситуациях, поскольку он&nbsp;во&nbsp;всем стремится обеспечить стабильность своей жизни. </p>
                                            <p>Реалист, хорошо адаптирован в&nbsp;обыденной повседневности. Он&nbsp;трезво смотрит на&nbsp;жизнь и&nbsp;редко верит в&nbsp;отвлеченные идеи. </p>
                                            <p>Часто озабочен своими материальными проблемами, упорно работает и&nbsp;проявляет завидную настойчивость, воплощая в&nbsp;жизнь свои планы. </p>
                                            <p>Негибкий и&nbsp;неартистичный, часто простой и&nbsp;лишенный чувства юмора в&nbsp;обычной жизни, он&nbsp;проявляет постоянство своих привычек и&nbsp;интересов. </p>
                                            <p>Не&nbsp;любит резких перемен, предпочитает надежность во&nbsp;всем, что его окружает. Он&nbsp;несентиментален, поэтому его трудно вывести из&nbsp;равновесия, повлиять на&nbsp;сделанный выбор. </p>
                                            <p>Ко&nbsp;всем жизненным событиям подходит с&nbsp;логической меркой, ищет рациональных объяснений и&nbsp;практической выгоды. </p>
                                            <p class="my-5 font-weight-bold text-center">Рекомендации </p>
                                            <p><b>Не&nbsp;обесценивайте&nbsp;то, что не&nbsp;понимаете</b></p>
                                            <p>Не&nbsp;будьте упрямы, не&nbsp;нужно всё подвергать сомнению. Прислушивайтесь к&nbsp;каждому мнению, каким&nbsp;бы нелепым оно вам не&nbsp;казалось. </p>
                                            <p><b>Будьте искренними</b></p>
                                            <p>Искренность позволяет расположить людей к&nbsp;себе.</p>',
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
