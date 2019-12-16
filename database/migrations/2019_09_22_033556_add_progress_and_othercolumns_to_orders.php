<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProgressAndOthercolumnsToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('progressStatus');
            $table->string('paymentStatus');
            $table->string('refId');
            $table->integer('writerAssigned')->nullable();
            $table->integer('adminAssigned')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['progressStatus', 'paymentStatus', 'refId', 'writerAssigned', 'adminAssigned']);
        });
    }
}
