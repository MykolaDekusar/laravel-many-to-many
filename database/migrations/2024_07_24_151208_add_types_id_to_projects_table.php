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
        Schema::table('projects', function (Blueprint $table) {
            // creating new column
            $table->unsignedBigInteger('type_id')
                ->nullable()
                ->after('id')
                // setting the field to null when deleting something from main table
                ->nullOnDelete();

            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // removing relationship beetween tables
            $table->dropForeign('projects_type_id_foreign');
            // deleting column
            $table->dropColumn('type_id');
        });
    }
};
