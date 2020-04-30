<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcel1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //在Schema的地方可以增加connection('你想連接的database')，然後再接上原先的create
        Schema::connection('mysql_excel')->create('excel1', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('create_by');
            $table->string('fileName');
            $table->string('name');
            $table->date('create_account');
            $table->string('ACNO');
            $table->string('product_name');
            $table->integer('invest_money');
            $table->string('index_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excel1');
    }
}
