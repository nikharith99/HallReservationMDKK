<?php

namespace App\Listeners;

use Illuminate\Auth\Events\PasswordResetLinkSent;
use Illuminate\Support\Facades\Log;

class LogPasswordResetLink
{
    public function handle(PasswordResetLinkSent $event)
    {
        // This will log when a reset link is sent
        Log::info('Password reset link requested for: ' . $event->user->getEmailForPasswordReset());

        // If you have access to the token, log the full URL
        // Note: Getting the token might require additional steps
    }
}
