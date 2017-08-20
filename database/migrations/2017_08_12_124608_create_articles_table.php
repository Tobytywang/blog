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
          $table->integer('category_id')->default(0);
          $table->string('title');
          $table->string('slug')->unique();
          $table->text('content')->nullable();
          $table->text('markdown')->nullable();
          $table->integer('view_count')->default(0);
          $table->timestamp('updated_at')->nullable();
          $table->timestamp('created_at')->nullable();
      });
    }
//    public function category()
//    {
//        return $this->belongsTo(Category::class);
//    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function(Blueprint $table){
            $table->dropForeign('category_id');
        });
        Schema::dropIfExists('articles');
    }
}
