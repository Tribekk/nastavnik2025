<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersonTypesColumnsAndRmTraitsStagesTestsAndConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stages_tests_and_consultations', function (Blueprint $table) {
            $table->dropColumn([
                'trait__ie_higher',
                'trait__ie_lower',
                'trait__ar_higher',
                'trait__ar_lower',
                'trait__op_higher',
                'trait__op_lower',
                'trait__ic_higher',
                'trait__ic_lower',
                'trait__ib_higher',
                'trait__ib_lower',
            ]);

            $table->boolean('person_type__pm')->nullable()->default(false)->after('depth_step_selection');
            $table->boolean('person_type__cb')->nullable()->default(false)->after('person_type__pm');
            $table->boolean('person_type__se')->nullable()->default(false)->after('person_type__cb');
            $table->boolean('person_type__sp')->nullable()->default(false)->after('person_type__se');
            $table->boolean('person_type__p')->nullable()->default(false)->after('person_type__sp');
            $table->boolean('person_type__h')->nullable()->default(false)->after('person_type__p');
            $table->boolean('person_type__aa')->nullable()->default(false)->after('person_type__h');
            $table->boolean('person_type__d')->nullable()->default(false)->after('person_type__aa');
            $table->boolean('person_type__gg')->nullable()->default(false)->after('person_type__d');
            $table->boolean('person_type__t')->nullable()->default(false)->after('person_type__gg');
            $table->boolean('person_type__ds')->nullable()->default(false)->after('person_type__t');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stages_tests_and_consultations', function (Blueprint $table) {
            $table->dropColumn([
                'person_type__pm',
                'person_type__cb',
                'person_type__se',
                'person_type__sp',
                'person_type__p',
                'person_type__h',
                'person_type__aa',
                'person_type__d',
                'person_type__gg',
                'person_type__t',
                'person_type__ds',
            ]);

            $table->boolean('trait__ie_higher')->nullable()->default(false)->after('depth_step_selection');
            $table->boolean('trait__ie_lower')->nullable()->default(false)->after('trait__ie_higher');
            $table->boolean('trait__ar_higher')->nullable()->default(false)->after('trait__ie_lower');
            $table->boolean('trait__ar_lower')->nullable()->default(false)->after('trait__ar_higher');
            $table->boolean('trait__op_higher')->nullable()->default(false)->after('trait__ar_lower');
            $table->boolean('trait__op_lower')->nullable()->default(false)->after('trait__op_higher');
            $table->boolean('trait__ic_higher')->nullable()->default(false)->after('trait__op_lower');
            $table->boolean('trait__ic_lower')->nullable()->default(false)->after('trait__ic_higher');
            $table->boolean('trait__ib_higher')->nullable()->default(false)->after('trait__ic_lower');
            $table->boolean('trait__ib_lower')->nullable()->default(false)->after('trait__ib_higher');
        });
    }
}
