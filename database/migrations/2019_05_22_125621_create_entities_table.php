<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('display_name');
            $table->softDeletes();
        });

        if (Schema::hasTable('fields')) {
            Schema::table('fields', function (Blueprint $table) {
                $table->unsignedBigInteger('entity_id')->change();

            });
            Schema::table('fields', function (Blueprint $table) {
                $table->foreign('entity_id')
                    ->references('id')
                    ->on('entities')
                    ->onDelete('cascade');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->dropForeign('fields_entity_id_foreign');
        });

        Schema::dropIfExists('entities');
    }
}
