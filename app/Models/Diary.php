<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'note',
        'note01',
        'note02',
    ];

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

    public function scopeSearch($query, $search)
    {
        $note = $search['note'] ?? '';

        $query->when($note, function ($query, $note) {
            $query->where('note', 'like', "%$note%")->orWhere('note01', 'like', "%$note%")->orWhere('note02', 'like', "%$note%");
        });

        return $query;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
