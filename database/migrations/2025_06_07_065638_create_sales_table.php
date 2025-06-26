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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id');
            $table->foreignId('customer_id')
                ->nullable()
                ->constrained('customers', 'customer_id')
                ->onDelete('cascade');
            $table->foreignId('payment_type_id')
                ->nullable()
                ->constrained('payment_types', 'payment_type_id');
            $table->string('sale_code', 8)->unique();
            $table->decimal('total_price_dollars', 10, 2);
            $table->decimal('total_price_bs', 10, 2);
            $table->decimal('exchange_rate_bs', 10, 2);
            $table->decimal('tax base', 10, 2);
            $table->integer('VAT');
            $table->decimal('VAT_tax_dollars', 10, 2);
            $table->decimal('credit_tax_dollars', 10, 2);
            $table->integer('discount');
            $table->enum('status', ['Pendiente', 'Completada', 'Cancelada', 'Facturada']);
            $table->date('expiration_date')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
