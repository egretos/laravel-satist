<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_fields', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('field_id');
            $table->text('json_query');

            $table->primary(['task_id', 'field_id']);
            $table->foreign('task_id')->references('id')->on('tasks')
                ->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('fields')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_fields', function (Blueprint $table) {
            $table->dropForeign('task_fields_task_id_foreign');
            $table->dropForeign('task_fields_field_id_foreign');
        });

        Schema::dropIfExists('task_fields');
    }
}
