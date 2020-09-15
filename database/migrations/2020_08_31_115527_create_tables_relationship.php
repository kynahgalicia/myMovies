<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors', function (Blueprint $table) {
            $table->id('actors_id');
            $table->string('name');
            $table->date('birthday');
            $table->longText('notes');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('producers', function (Blueprint $table) {
            $table->id('producers_id');
            $table->string('name');
            $table->date('birthday');
            $table->longText('notes');
            $table->timestamps();
        });
        Schema::create('genres', function (Blueprint $table) {
            $table->id('genres_id');
            $table->string('genre');
            $table->timestamps();
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->id('roles_id');
            $table->string('roles');
            $table->timestamps();
        });
        Schema::create('movies', function (Blueprint $table) {
            $table->id('movies_id');
            $table->string('title');
            $table->integer('year');
            $table->integer('runtime');
            $table->longText('plot');
            $table->bigInteger('genres_id')->unsigned();
            $table->foreign('genres_id')->references('genres_id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('producers_id')->unsigned();
            $table->foreign('producers_id')->references('producers_id')->on('producers')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('ratings_id');
            $table->integer('rating');
            $table->longtext('comment');
            $table->bigInteger('movies_id')->unsigned();
            $table->foreign('movies_id')->references('movies_id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('actor_movie_roles', function (Blueprint $table) {
            $table->bigInteger('actors_id')->unsigned();
            $table->foreign('actors_id')->references('actors_id')->on('actors')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('movies_id')->unsigned();
            $table->foreign('movies_id')->references('movies_id')->on('movies')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('roles_id')->unsigned();
            $table->foreign('roles_id')->references('roles_id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movies');
        Schema::drop('actors');
        Schema::drop('producers');
        Schema::drop('genres');
        Schema::drop('roles');
        Schema::drop('ratings');
        Schema::drop('actor_movie_roles');
    }
}
