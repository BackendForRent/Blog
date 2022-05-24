<?php namespace Goosy\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateBlogsTagsTable extends Migration
{
    public function up()
    {
        Schema::create('goosy_blog_blogs_tags', function (Blueprint $table) {
            $table->integer('blog_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->primary(['blog_id', 'tag_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('goosy_blog_blogs_tags');
    }
}
