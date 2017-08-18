<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // 文章目录
      Schema::create('categories', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->unique();
          $table->unsignedInteger('father')->default(0);
          $table->string('path')->unique();
          $table->enum('type', ['column', 'page']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
