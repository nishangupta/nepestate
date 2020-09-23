<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('price');
            $table->boolean('negotiable');
            $table->string('address');
            $table->text('description');
            $table->unsignedMediumInteger('bed');
            $table->string('img_url');
            $table->unsignedMediumInteger('bath');
            $table->unsignedBigInteger('area');
            $table->string('telephone');
            $table->string('email');
            $table->string('agent')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->boolean('onSale')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
