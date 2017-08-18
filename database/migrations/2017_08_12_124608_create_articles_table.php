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
          $table->integer('category_id')->unsigned()->default(0);
          $table->string('slug')->unique();
          $table->string('title');
          $table->string('subtitle')->default('');
          // $table->json('content');
          $table->text('content')->default('');
          $table->text('markdown')->default('');
          $table->integer('view_count')->unsigned()->default(0)->index();
          $table->timestamp('updated_at')->nullable();
          $table->timestamp('created_at')->nullable();
          $table->foreign('category_id')
              ->references('id')
              ->on('categories')
              ->onUpdate('cascade')
              ->onDelete('cascade');
      });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function(Blueprint $tabel){
            $table->dropForeign('posts_category_id_foreign');
        });
        Schema::dropIfExists('articles');
    }
}
