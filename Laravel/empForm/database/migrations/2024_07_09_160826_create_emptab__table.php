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
        Schema::create('emptab_', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('salary');
            $table->string('position');
            $table->string('department');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emptab_');
    }
};
// 'name' => 'required|string|max:255',
// 'email' => 'required|email|max:255',
// 'salary' => 'required|integer',
// 'position' => 'required|string|max:255',
// 'department' => 'required|string|max:255',