<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('duration')->nullable();
            $table->integer('max_people');
            $table->decimal('total_price', 15, 2);
            $table->integer('min_age');
            $table->string('package_title')->unique();
            $table->longText('overview');
            $table->longText('trip_highlights')->nullable();
            $table->longText('trip_difficulties')->nullable();
            $table->longText('best_season')->nullable();
            $table->longText('accommodation')->nullable();
            $table->longText('included')->nullable();
            $table->longText('excluded')->nullable();
            $table->timestamps();
        });
    }
}
