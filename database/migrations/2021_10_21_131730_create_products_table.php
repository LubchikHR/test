<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned()->index('IDX_USER_ID');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->double('price');
            $table->integer('qty')->default(1);
            $table->boolean('deleted')->default(false);
            $table->timestamps();

            $table->foreign('userId', 'FK_USER_ID')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
