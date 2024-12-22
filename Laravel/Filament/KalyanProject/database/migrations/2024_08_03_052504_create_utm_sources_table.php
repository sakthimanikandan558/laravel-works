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
        Schema::create('utm_sources', function (Blueprint $table) {
            $table->id();
            $table->string('utm_source');
            $table->string('utm_medium');
            $table->string('utm_campaign');
            $table->text('comments')->nullable();
            $table->boolean('blocked_status')->default(false);
            $table->unsignedBigInteger('blocked_by')->nullable();
            $table->foreignId('manage_agency_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utm_sources');
    }
};
