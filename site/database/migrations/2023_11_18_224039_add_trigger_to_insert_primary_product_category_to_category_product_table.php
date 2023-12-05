<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected string $triggerName = 'insert_primary_product_category_to_category_product_table';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product_categories', function (Blueprint $table) {
            DB::unprepared(get_sql_or_fail("triggers/{$this->triggerName}"));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_categories', function (Blueprint $table) {
            DB::unprepared("DROP TRIGGER {$this->triggerName}");
        });
    }
};
