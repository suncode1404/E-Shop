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
        Schema::create('categories',function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->integer('priority')->default(0)->comment('Thứ tự xuất hiện');
            $table->boolean('hidden')->default(0)->comment('0 là ẩn, 1 là hiện');
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('name', 255);
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('image');
            $table->boolean('hot')->default(0)->comment('0 là bình thường, 1 là hot');
            $table->integer('heart')->default(0)->comment('Số lượng tim sản phẩm');
            $table->integer('view')->default(0)->comment('Số lượng người xem sản phẩm');
            $table->boolean('hidden')->default(0)->comment('0 là ẩn, 1 là hiện');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};
