<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateFollowableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('follower_id');
            $table->unsignedBigInteger('leader_id');
            $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('leader_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('followable');

    }
}
