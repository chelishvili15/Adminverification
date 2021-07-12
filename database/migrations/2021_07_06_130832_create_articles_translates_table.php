<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_translates', function (Blueprint $table) {
            $table->id(); 
            $table->integer('article_id')->foreign()->references('id')->on('articles')->onDelete('cascade');
            $table->string('title', 100); 
            $table->string('description', 255); 
            $table->text('text'); 
            $table->string('lang', 2); 
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
        Schema::dropIfExists('articles_translates');
    }
}
