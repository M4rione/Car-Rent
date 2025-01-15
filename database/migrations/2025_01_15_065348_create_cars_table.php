<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('plate')->nullable();
            $table->string('brand')->nullable();
            $table->enum('type', ['sedan', 'MPV', 'SUV'])->nullable();
            $table->string('capacity')->nullable();
            $table->string('price')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
