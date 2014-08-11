<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyTable extends Migration
{

    private $tableName = "Replies";
    private $tableNameFK = "Tweets";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->integer('tweet_id')->unsigned();
            $table->integer('is_replay_to_id')->unsigned();

            $table->foreign('tweet_id')->references('id')->on($this->tableNameFK);
            $table->foreign('is_replay_to_id')->references('id')->on($this->tableNameFK);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }

}
