<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Rename the 'name' column to 'first_name'
            $table->renameColumn('name', 'first_name');

            // Add a new 'last_name' column
            $table->string('last_name')->nullable();
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
            // Rename 'first_name' back to 'name'
            $table->renameColumn('first_name', 'name');

            // Drop the 'last_name' column
            $table->dropColumn('last_name');
        });
    }
};
