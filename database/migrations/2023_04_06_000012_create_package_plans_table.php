<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagePlansTable extends Migration
{
    public function up()
    {
        Schema::create('package_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plan_title');
            $table->longText('description');
            $table->timestamps();
        });
    }
}
