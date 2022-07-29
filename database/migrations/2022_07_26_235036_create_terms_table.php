<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->date('start');
            $table->date('end');
            $table->timestamps();
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->foreignId('term_id')->nullable()->constrained();
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->bigInteger('term_id')->nullable(false)->change(); // Hack to make it work with SQLite
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropConstrainedForeignId('term_id');
        });
        Schema::dropIfExists('terms');
    }
};
