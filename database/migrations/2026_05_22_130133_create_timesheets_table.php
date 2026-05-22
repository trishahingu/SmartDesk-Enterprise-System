<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('timesheets', function (Blueprint $table) {

    $table->id();

    $table->foreignId('user_id')
          ->constrained()
          ->onDelete('cascade');

    $table->date('work_date');

    $table->time('clock_in');

    $table->time('clock_out')->nullable();

    $table->integer('total_hours')->nullable();

    $table->text('work_notes')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timesheets');
    }
};
