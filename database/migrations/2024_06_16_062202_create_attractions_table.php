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
        Schema::create('attractions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Destination::class);
            $table->foreignIdFor(\App\Models\Guide::class);
            $table->string('name');
            $table->string('type');
            $table->text('description')->nullable();
            $table->integer('average_time_visit');
            $table->float('average_cost_visit', 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attractions');
    }
};
