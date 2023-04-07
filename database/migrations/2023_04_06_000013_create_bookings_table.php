<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->date('from_date');
            $table->integer('total_people');
            $table->decimal('total_price', 15, 2);
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}
