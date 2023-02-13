<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsMirrorsTable extends Migration
{
    public function up()
    {
        Schema::create('news_mirrors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->string('guid')->nullable();
            $table->string('description')->nullable();
            $table->string('author')->nullable();
            $table->string('category')->nullable();
            $table->string('pub_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
