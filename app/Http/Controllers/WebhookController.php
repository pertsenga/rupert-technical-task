<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Routing\Controllers\HasMiddleware;
use Log;

class WebhookController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        // Validate webhook call first
        return [
            function (Request $request, Closure $next) {
                // Check if secret_key is correct before handling webhook
                if ($request->query('secret_key') == env('WEBHOOK_SECRET_KEY')) {
                    return $next($request);
                }
            },
        ];
    }

    public function handle(Request $request)
    {
        Log::info('Webhook received', $request->all());

        // Return a response to acknowledge receipt of the webhook.
        return response()->json(['status' => 'success'], 200);
    }
}
