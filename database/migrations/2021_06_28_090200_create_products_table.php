<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


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
            $table->string("image", 255);
            $table->string("name", 255);
            $table->string('excel');
            $table->decimal("price", 6, 2);
            $table->integer('stock');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('unit_id');
            $table->integer('tag_id');
            $table->boolean('refundable_id');
            $table->text('detail');
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