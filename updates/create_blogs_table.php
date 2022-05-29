<?php namespace Goosy\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('goosy_blog_blogs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('title')->nullable()->index();
            $table->string('slug')->nullable()->unique();
            $table->string('content_preview')->nullable();
            $table->text('content')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('views')->nullable()->default(0);
            $table->unsignedInteger('sort_order')->nullable()->index();
            $table->boolean('is_published')->default(false)->index();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('goosy_blog_blogs');
    }
}
