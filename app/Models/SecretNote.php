<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SecretNote extends Model
{
    protected $fillable = [
        'note',
        'password',
        'expires_at',
        'user_id',
        'opened_at',
    ];

    protected $dates = ['expires_at', 'opened_at'];

    protected $casts = [
        'expires_at' => 'datetime',
        'opened_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function isExpired()
    {
        return $this->expires_at && now()->greaterThan($this->expires_at);
    }

    public function getRemainingTime()
    {
        return $this->expires_at ? now()->diffForHumans($this->expires_at, [
            'parts' => 2,
            'short' => true,
            'syntax' => Carbon::DIFF_RELATIVE_TO_NOW,
        ]) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
