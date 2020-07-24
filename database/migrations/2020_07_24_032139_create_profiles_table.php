<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // 名前(name)、性別(gender)、趣味(hobby)、自己紹介(introduction)
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // 自己紹介の名前を保存するカラム
            $table->string('gender');  // 自己紹介の性別を保存するカラム
            $table->string('hobby');  // 自己紹介の趣味を保存するカラム
            $table->string('introduction');  // 自己紹介を保存するカラム
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
        Schema::dropIfExists('profiles');
    }
}
