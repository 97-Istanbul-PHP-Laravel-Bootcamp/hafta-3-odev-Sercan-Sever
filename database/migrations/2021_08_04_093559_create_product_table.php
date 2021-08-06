<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('unicode', 150);
            $table->string('slug', 255);
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->integer('order');
            $table->string('status', 1);
            $table->decimal('prc', 10, 2);
            $table->string('cid', 1);
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
        Schema::dropIfExists('product');
    }
}
