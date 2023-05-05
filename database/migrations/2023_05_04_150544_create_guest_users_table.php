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
        Schema::create('guest_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->require();
            $table->string('email')->require();
            $table->string('phone')->require();
            $table->text('address')->require();
            $table->text('detail_address')->require();
            $table->string('latitude')->require();
            $table->string('longitude')->require();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_users');
    }
};
