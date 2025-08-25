<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Token;

class AutoCleanExpiredTokens extends Command
{
    /**
     * Tên và signature của command
     *
     * @var string
     */
    protected $signature = 'tokens:clean-expired';

    /**
     * Mô tả của command
     *
     * @var string
     */
    protected $description = 'Xóa các token đã hết hạn trong bảng tokens';

    /**
     * Thực thi command
     */
    public function handle()
    {
        $deleted = Token::where('expiry', '<', now())->delete();

        $this->info("Đã xóa {$deleted} token hết hạn.");
    }
}
