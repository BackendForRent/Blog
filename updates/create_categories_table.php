<?php namespace Goosy\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('goosy_blog_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('title')->nullable()->index();
            $table->string('slug')->nullable()->index();
            $table->string('description')->nullable();
            $table->unsignedInteger('sort_order')->nullable()->index();
            $table->boolean('is_published')->default(false)->index();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('goosy_blog_categories');
    }
}
