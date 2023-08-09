<?php

namespace App\Http\Middleware;

use App\Models\AppHttpRequest;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TerminatingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    /**
     * handle tasks after response has been sent to the browser
     *
     * @return void
     */
    public function terminate(Request $request, Response $response): void
    {
        $http_request = new AppHttpRequest([
            'session_id'  => session()->getId(),
            'user_id'     => $request->user()->id ?? null,
            'ip'          => $request->ip(),
            'ajax'        => $request->ajax(),
            'url'         => $request->fullUrl(),
            'payload'     => $request->toArray(),
            'status_code' => $response->getStatusCode()
        ]);

        Log::info('http_request', $http_request->toArray());

        $http_request->save();
    }
}
