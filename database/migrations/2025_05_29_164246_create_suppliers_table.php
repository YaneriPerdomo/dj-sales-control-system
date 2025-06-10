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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('supplier_id');
            $table->foreignId('gender_id')->constrained('genders', 'gender_id');
            $table->string('name', 90)->unique();
            $table->string('rif', 12)->nullable()->unique();
            $table->integer('telephone_number')->nullable()->unique();
            $table->string('address', 120)->nullable()->unique();
            $table->string('slug', 90)->unique();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
