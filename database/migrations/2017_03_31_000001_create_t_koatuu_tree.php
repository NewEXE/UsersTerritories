<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTKoatuuTree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('t_koatuu_tree', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->char('ter_id', 10);
            $table->char('ter_pid', 10)->nullable();
            $table->string('ter_name', 96);
            $table->string('ter_address', 128);
            $table->integer('ter_type_id');
            $table->tinyInteger('ter_level');
            $table->tinyInteger('ter_mask');
            $table->char('reg_id', 2);
            $table->primary('ter_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_koatuu_tree');
    }
}
