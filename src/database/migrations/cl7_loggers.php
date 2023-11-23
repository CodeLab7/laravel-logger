<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('cl7_loggers', function (Blueprint $table) {
            $table->id();
            $table->string("token");
            $table->bigInteger("reff_id");
            $table->string("entity");
            $table->integer("user_id");
            $table->text("data");
            $table->text("note")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('cl7_loggers');
    }

};
