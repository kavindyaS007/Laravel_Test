<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podetails', function (Blueprint $table) {
            $table->id('poNo');
            $table->integer('zone');
            $table->integer('region');
            $table->integer('territory');
            $table->integer('distributor');
            $table->date('date');
            $table->String('remark');
            $table->integer('totalPrice');
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
        Schema::dropIfExists('podetails');
    }
}
