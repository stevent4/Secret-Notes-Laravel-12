<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoteLog extends Model
{
    protected $fillable = ['uuid', 'user_id', 'expires_at', 'opened_at'];

    protected $dates = ['expires_at', 'opened_at']; // ← optional, boleh tetap ada

    protected $casts = [
        'expires_at' => 'datetime',
        'opened_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isExpired()
    {
        return $this->expires_at && now()->greaterThan($this->expires_at);
    }
}
