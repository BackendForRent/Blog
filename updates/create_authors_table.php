<?php namespace Goosy\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAuthorsTable extends Migration
{
    public function up()
    {
        Schema::create('goosy_blog_authors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name')->nullable()->index();
            $table->string('surname')->nullable()->index();
            $table->string('nickname')->nullable()->index();
            $table->text('description')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('telephone', 25)->nullable();
            $table->boolean('is_suspended')->default(false)->index();
            $table->unsignedInteger('sort_order')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('goosy_blog_authors');
    }
}
