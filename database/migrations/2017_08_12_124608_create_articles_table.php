<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('articles', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('category_id')->unsigned();
          $table->string('slug')->unique();
          $table->string('title');
          $table->string('subtitle');
          // $table->json('content');
          $table->text('content');
          $table->text('markdown');
          $table->integer('view_count')->unsigned()->default(0)->index();
          $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
