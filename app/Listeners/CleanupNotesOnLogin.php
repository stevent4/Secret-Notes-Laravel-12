<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use App\Models\SecretNote;

class CleanupNotesOnLogin
{
    public function handle(Login $event)
    {
        SecretNote::where('user_id', $event->user->id)
            ->whereNotNull('expires_at')
            ->where('expires_at', '<', Carbon::now())
            ->delete();
    }
}
