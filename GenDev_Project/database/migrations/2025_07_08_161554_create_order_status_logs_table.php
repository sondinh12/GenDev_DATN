<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('order_status_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('changed_by')->nullable()->constrained('users')->nullOnDelete();

            $table->enum('type', ['order', 'payment', 'note'])->default('order');

            // Trạng thái cũ/mới (để truy vết thay đổi)
            $table->string('old_status')->nullable();
            $table->string('new_status')->nullable();

            // STK hoàn tiền (nếu có khi xử lý refund)
            $table->string('refund_bank_account')->nullable();

            // Ghi chú kèm theo
            $table->text('note')->nullable();

            // Thời điểm thay đổi rõ ràng (ngoài created_at)
            $table->timestamp('changed_at')->useCurrent();

            // Timestamps Eloquent (tránh lỗi orderBy created_at)
            $table->timestamps();

            // Index gợi ý
            $table->index(['order_id', 'changed_at']);
            $table->index(['type', 'changed_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_status_logs');
    }
};
