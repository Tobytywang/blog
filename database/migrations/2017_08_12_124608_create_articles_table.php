<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     * 基本的属性：id,category_id,title,slug,content/markdown,viewcount,created_at/updated_at
     * 对于时间的文章：需要标签和时间
     * 对于归档的文章：需要目录id
     * @return void
     */
    public function up()
    {
      Schema::create('articles', function (Blueprint $table) {
        $table->increments('id');
        $table->bigInteger('category_id')->index();
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('content')->nullable();
        $table->text('markdown')->nullable();
        $table->integer('view_count')->default(0);
        $table->dateTime('created_at');
        $table->dateTime('updated_at');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('articles', function(Blueprint $table){
        //     $table->dropForeign('category_id');
        // });
        Schema::dropIfExists('articles');
    }
}
