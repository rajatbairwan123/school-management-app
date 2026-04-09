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
        Schema::table('schools', function (Blueprint $table) {

            if (!Schema::hasColumn('schools', 'school_code')) {
                $table->string('school_code')->unique()->after('id');
            }

            if (!Schema::hasColumn('schools', 'logo')) {
                $table->string('logo')->nullable()->after('name');
            }

            if (!Schema::hasColumn('schools', 'parent_school_id')) {
                $table->foreignId('parent_school_id')->nullable();
            }

            if (!Schema::hasColumn('schools', 'branch_name')) {
                $table->string('branch_name')->nullable();
            }

            if (!Schema::hasColumn('schools', 'status')) {
                $table->boolean('status')->default(1);
            }
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
