<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('tagline');
            $table->foreignId('service_category_id')->constrained('service_categories')->cascadeOnDelete();
            $table->decimal('price', 8, 2);
            $table->decimal('discount')->nullable();
            $table->enum('discount_type', ['fixed', 'percent'])->nullable();
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('featured')->default(false);
            $table->longText('description')->nullable();
            $table->foreignId('posted_by')->constrained('users')->onDelete('cascade'); // Poster (client/admin)
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('services');
    }
}
