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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('childcategory_id')->nullable();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('slider_id');
            $table->unsignedBigInteger('seller_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('product_quantity');
            $table->string('slug');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->text('short_text');
            $table->text('description')->nullable();
            $table->string('upcomming')->nullable();
            $table->integer('status')->nullable();
            $table->string('free_shipping')->nullable();
            $table->string('top_rated')->nullable();
            $table->string('views')->nullable();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
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
