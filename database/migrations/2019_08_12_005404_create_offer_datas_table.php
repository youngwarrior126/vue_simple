<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('offer_name');
            $table->string('offer_link');
            $table->string('ip');
            $table->string('user_agent');
            $table->string('screen_resolution');
            $table->integer('profile_data_id');
            $table->string('usage_type')->nullable();
            $table->string('created_by');
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
        Schema::dropIfExists('offer_datas');
    }
}
