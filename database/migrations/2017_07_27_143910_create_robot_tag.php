<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRobotTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robot_tag', function (Blueprint $table) {
            $table->unsignedInteger('robot_id');
            $table->unsignedInteger('tag_id');

            $table->unique(['tag_id', 'robot_id']); // évite les doublons de couple

            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('CASCADE');
            $table->foreign('robot_id')->references('id')->on('robots')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('robot_tag');
    }
}
