<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagesTestsAndConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages_tests_and_consultations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('consultation_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();

            $table->integer('class__year')->nullable();
            $table->string('class');
            $table->string('school');

            $table->string('full_name');
            $table->integer('age');
            $table->integer('gender');
            $table->string('kladr_code')->nullable();
            $table->string('kladr_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->boolean('student_questionnaire_finished')->nullable()->default(false);

            $table->string('parent__full_name')->nullable();
            $table->string('parent__phone')->nullable();
            $table->string('parent__email')->nullable();
            $table->boolean('parent_questionnaire_finished')->nullable()->default(false);

            $table->boolean('trait__ie_higher')->nullable()->default(false);
            $table->boolean('trait__ie_lower')->nullable()->default(false);
            $table->boolean('trait__ar_higher')->nullable()->default(false);
            $table->boolean('trait__ar_lower')->nullable()->default(false);
            $table->boolean('trait__op_higher')->nullable()->default(false);
            $table->boolean('trait__op_lower')->nullable()->default(false);
            $table->boolean('trait__ic_higher')->nullable()->default(false);
            $table->boolean('trait__ic_lower')->nullable()->default(false);
            $table->boolean('trait__ib_higher')->nullable()->default(false);
            $table->boolean('trait__ib_lower')->nullable()->default(false);

            $table->boolean('base_tests_finished')->nullable()->default(false);
            $table->integer('base_tests_percentage')->nullable()->default(0);
            $table->enum('base_step_selection', ['matched', 'partially_matched', 'mismatched'])->nullable()->default('mismatched');

            $table->boolean('depth_tests_finished')->nullable()->default(false);
            $table->integer('depth_tests_percentage')->nullable()->default(0);
            $table->boolean('invited_depth_tests')->nullable()->default(false);
            $table->enum('depth_step_selection', ['target', 'partially_target', 'not_target'])->nullable()->default('not_target');

            $table->boolean('got_consultation')->nullable();
            $table->enum('got_consultation_status', ['carried_out', 'invited', 'not_invited'])->nullable();
            $table->boolean('got_consultation_with_parent')->nullable();
            $table->enum('got_consultation_status_with_parent', ['carried_out', 'invited', 'not_invited'])->nullable();
            $table->enum('recommend', ['recommend', 'not_recommend'])->nullable();
            $table->enum('agree', ['agree', 'not_agree', 'think'])->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('school_id')
                ->references('id')
                ->on('schools')
                ->onDelete('cascade');

            $table->foreign('class_id')
                ->references('id')
                ->on('school_classes')
                ->onDelete('cascade');

            $table->foreign('consultation_id')
                ->references('id')
                ->on('consultations')
                ->onDelete('cascade');

            $table->foreign('parent_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->index('class__year');
            $table->index('age');
            $table->index('gender');
            $table->index('kladr_code');
            $table->index('base_tests_finished');
            $table->index('base_step_selection');
            $table->index('depth_tests_finished');
            $table->index('invited_depth_tests');
            $table->index('depth_step_selection');
            $table->index('got_consultation', 'idx_got_cons');
            $table->index('got_consultation_status', 'idx_got_cons_status');
            $table->index('got_consultation_with_parent', 'idx_got_cons_with_parent');
            $table->index('got_consultation_status_with_parent', 'idx_got_cons_with_parent_status');
            $table->index('recommend');
            $table->index('agree');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stages_tests_and_consultations');
    }
}
