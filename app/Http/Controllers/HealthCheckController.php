<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HealthCheckController extends Controller
{
    public function live(): JsonResponse
    {
        return response()->json([
            'status' => 'ok',
            'check' => 'live',
        ]);
    }

    public function ready(): JsonResponse
    {
        $checks = [
            'database' => $this->databaseIsReady(),
            'cache' => $this->cacheIsReady(),
            'storage' => is_writable(storage_path()) && is_writable(storage_path('framework')),
            'bootstrap_cache' => is_writable(base_path('bootstrap/cache')),
        ];

        $ready = ! in_array(false, $checks, true);

        return response()->json([
            'status' => $ready ? 'ok' : 'unavailable',
            'check' => 'ready',
            'checks' => $checks,
        ], $ready ? 200 : 503);
    }

    private function databaseIsReady(): bool
    {
        try {
            DB::connection()->getPdo();

            return true;
        } catch (\Throwable $exception) {
            return false;
        }
    }

    private function cacheIsReady(): bool
    {
        try {
            $key = 'health_check_'.bin2hex(random_bytes(4));
            Cache::put($key, true, now()->addMinute());
            $ready = Cache::get($key) === true;
            Cache::forget($key);

            return $ready;
        } catch (\Throwable $exception) {
            return false;
        }
    }
}
