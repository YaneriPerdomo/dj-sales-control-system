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
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id('sale_detail_id');
            $table->foreignId('sale_id')
                ->nullable()
                ->constrained('sales', 'sale_id')
                ->onDelete('cascade');
            $table->foreignId('product_id')
                ->nullable()
                ->constrained('products', 'product_id')
                ->onDelete('set null');
            $table->integer('quantity');
            $table->decimal('unit_cost_dollars', 10, 2);
            $table->decimal('unit_cost_bs', 10, 2);
            $table->decimal('subtotal_dollars', 10, 2);
            $table->decimal('subtotal_bs', 10, 2);
            $table->integer('tax_rate');
            $table->decimal('tax_dollars', 10, 2);
            $table->decimal('tax_bs', 10, 2);
            $table->integer('discount_only_dollars');
            $table->decimal('line_total_dollars', 10, 2);
            $table->decimal('line_total_bs', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_details');
    }
};
