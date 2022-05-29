<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('art_id')->nullable();
            $table->unsignedBigInteger('tag_id')->nullable();

            $table->timestamps();
            // IDX
            $table->index('art_id', 'articles_tag_art_idx');
            $table->index('tag_id', 'articles_tag_tag_idx');
            // FK
            $table->foreign('art_id', 'articles_tag_art_fk')->on('articles')->references('id');
            $table->foreign('tag_id', 'articles_tag_tag_fk')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles_tags');
    }
};
