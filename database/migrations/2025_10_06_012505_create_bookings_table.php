<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('hall_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');

            // Organizer info
            $table->string('organizer_name');
            $table->string('organizer_ic')->nullable();
            $table->string('organization')->nullable();
            $table->string('phone');

            // Booking details
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->text('purpose')->nullable();
            $table->integer('attendees')->nullable();

            // File uploads
            $table->string('attachment')->nullable();

            // Status: pending / approved / rejected
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
