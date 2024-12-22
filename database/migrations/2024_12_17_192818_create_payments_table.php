<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // database/migrations/xxxx_xx_xx_create_payments_table.php

public function up()
{
    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->string('customer_name');
        $table->decimal('amount', 10, 2);
        $table->enum('status', ['pending', 'completed']);
        $table->date('payment_date');
        $table->timestamps();
    });
}

};
