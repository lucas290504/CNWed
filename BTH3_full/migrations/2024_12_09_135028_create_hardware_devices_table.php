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
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id(); // Mã thiết bị
            $table->string('device_name'); // Tên thiết bị
            $table->string('type'); // Loại thiết bị (ví dụ: Mouse, Keyboard, Headset)
            $table->boolean('status')->default(true); // Trạng thái hoạt động (true = hoạt động, false = hỏng)
            $table->foreignId('center_id')->constrained('it_centers')->onDelete('cascade'); // Khóa ngoại liên kết đến bảng it_centers
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_devices');
    }
};
