<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('worker_data', function (Blueprint $table) {
            $table->id("worker_id");
            $table->timestamps();
            $table->string('name');
            $table->string('photo');
            $table->foreignId('id')->constrained("workers")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
