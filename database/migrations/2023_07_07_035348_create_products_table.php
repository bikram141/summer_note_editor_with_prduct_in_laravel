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
            $table->string('Product_name')->nullable();
            $table->integer('cat_id')->nullable();
            $table->string('Product_image')->nullable();
            $table->string('Price')->nullable();
            $table->string('manufacture')->nullable();
            $table->date('publish_date');
            $table->text('Description')->nullable();
            $table->enum('Status',['1','0'])->default('1');
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
        Schema::dropIfExists('products');
    }
}
