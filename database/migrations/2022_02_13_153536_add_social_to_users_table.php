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
        Schema::table('users', function (Blueprint $table) {
            $table->string('facebook')->after('bio')->default('https://facebook.com')->nullable();
            $table->string('twitter')->after('bio')->default('https://twitter.com')->nullable();
            $table->string('instagram')->after('bio')->default('https://instagram.com')->nullable();
            $table->string('linkedin')->after('bio')->default('https://linkedin.com')->nullable();
            $table->string('youtube')->after('bio')->default('https://youtube.com')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
