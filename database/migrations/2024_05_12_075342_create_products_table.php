<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('priority')->default(0)->comment('Thứ tự xuất hiện');
            $table->boolean('hidden')->default(0)->comment('0 là ẩn, 1 là hiện');
            $table->timestamps();
        });
        
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('name', 255);
            $table->text('description');
            $table->mediumText('short_description')->nullable();
            $table->integer('quantity_available')->comment('số lượng có sẵn');
            $table->integer('price');
            $table->string('image');
            $table->boolean('hot')->default(0)->comment('0 là bình thường, 1 là hot');
            $table->integer('heart')->default(0)->comment('Số lượng tim sản phẩm');
            $table->integer('view')->default(0)->comment('Số lượng người xem sản phẩm');
            $table->boolean('hidden')->default(0)->comment('0 là ẩn, 1 là hiện');
            $table->timestamps();
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->string('img_thumbnail', 255);
        });
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
        });
        Schema::create('product_specification', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->string('ram');
            $table->string('cpu');
            $table->string('dia_cung');
            $table->string('mau_sac');
            $table->float('can_nang');
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('company');
        Schema::dropIfExists('product_specification');
        Schema::dropIfExists('product_images');
    }
};
