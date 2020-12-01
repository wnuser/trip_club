<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdsHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ads_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ad_id');
            $table->string('company_name');
            $table->string('image');
            $table->string('hyper_link');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('clicks');
            $table->integer('isRunning');
            $table->timestamps();
            $table->softDeletes();
        });
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
