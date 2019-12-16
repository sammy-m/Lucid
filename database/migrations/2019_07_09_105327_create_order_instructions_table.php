<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_instructions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('deadline');
            $table->integer('deadlineHour');
            $table->string('subject');
            $table->string('title');
            $table->string('citation');
            $table->string('sources');
            $table->string('paperSize');
            $table->longText('projectSpecification');
            $table->integer('client');
            $table->binary('file1')->nullable();
            $table->binary('file2')->nullable();
            $table->binary('file3')->nullable();
            $table->binary('file4')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_instructions');
    }
}
