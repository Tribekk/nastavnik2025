<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeTitleConsultationResultTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('consultation_result_types')
            ->where('code', 'other')
            ->update([
                'code' => 'results',
                'title' => 'Итоги консультации',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('consultation_result_types')
            ->where('code', 'results')
            ->update([
                'code' => 'other',
                'title' => 'Другое',
            ]);
    }
}
