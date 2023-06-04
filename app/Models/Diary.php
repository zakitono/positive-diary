<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    // id

    /**
     * id :一意(autoincrement)、null × 同じ値 ×
     * date:(日付 yyyy-mm-dd) null ×
     * note01 text null許可
     * note02 text null許可
     * note03 text null許可
     *
     * 出来たらTryする
     * cover_image: 画像の登録
     *
     */
}
