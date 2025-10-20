<?php

use Domain\Quiz\Models\ProfessionalType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShortCodeToProfessionalTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('professional_types', function (Blueprint $table) {
            $table->string('short_code')->after('uuid');
        });

        ProfessionalType::where('title', 'Физико–математический тип')->update(['short_code' => 'pm']);
        ProfessionalType::where('title', 'Химико-биологический тип')->update(['short_code' => 'cb']);
        ProfessionalType::where('title', 'Социально-экономический тип')->update(['short_code' => 'se']);
        ProfessionalType::where('title', 'Социально-политический тип')->update(['short_code' => 'sp']);
        ProfessionalType::where('title', 'Филологический тип')->update(['short_code' => 'p']);
        ProfessionalType::where('title', 'Гуманитарный тип')->update(['short_code' => 'h']);
        ProfessionalType::where('title', 'Художественно-эстетический тип')->update(['short_code' => 'aa']);
        ProfessionalType::where('title', 'Цифровой тип')->update(['short_code' => 'd']);
        ProfessionalType::where('title', 'Геолого-географический тип')->update(['short_code' => 'gg']);
        ProfessionalType::where('title', 'Технический тип')->update(['short_code' => 't']);
        ProfessionalType::where('title', 'Оборонно-спортивный тип')->update(['short_code' => 'ds']);

        Schema::table('professional_types', function (Blueprint $table) {
            $table->unique('short_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('professional_types', function (Blueprint $table) {
            $table->dropUnique(['short_code']);
            $table->dropColumn('short_code');
        });
    }
}
