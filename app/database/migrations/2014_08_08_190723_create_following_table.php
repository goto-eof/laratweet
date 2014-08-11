<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowingTable extends Migration
{

    private $tableName = "Followings";
    private $tableNameFK = "Users"; // tabella per le Foreign Keys
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('follows_user_id')->unsigned();

            $table->unique(array('user_id','follows_user_id'));
            $table->foreign('follows_user_id')->references('id')->on($this->tableNameFK);
            $table->foreign('user_id')->references('id')->on($this->tableNameFK);
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
