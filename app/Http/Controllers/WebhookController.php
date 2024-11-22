<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Closure;
use Log;

class WebhookController extends Controller
{
    const IP_WHITELIST = [

    ];

    public static function middleware(): array
    {
        // Validate webhook call first
        return [
            function (Request $request, Closure $next) {
                // Check if request is from a whitelisted IP
                if ($this->isWhitelistedIp($request->ip())) {
                    return $next($request);
                }
            },
            function (Request $request, Closure $next) {
                // Check if secret_key is correct before handling webhook
                if ($request->query('secret_key') == env('WEBHOOK_SECRET_KEY')) {
                    return $next($request);
                }
            },
        ];
    }

    public function handleWebhook(Request $request)
    {
        Log::info('Webhook received', $request->all());

        // Return a response to acknowledge receipt of the webhook.
        return response()->json(['status' => 'success']);
    }

    private function isWhitelistedIp($ip): bool
    {
        return in_array($ip, $this::IP_WHITELIST);
    }
}
