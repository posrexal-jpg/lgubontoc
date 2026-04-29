<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'user_role',
        'category',
        'action',
        'description',
        'method',
        'route_name',
        'url',
        'ip_address',
        'user_agent',
        'status_code',
        'properties',
    ];

    protected $casts = [
        'properties' => 'array',
        'status_code' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function record(string $category, string $action, string $description, ?Request $request = null, array $properties = []): void
    {
        $user = $request?->user() ?? auth()->user();

        self::create([
            'user_id' => $user?->id,
            'user_name' => $user?->name,
            'user_email' => $user?->email,
            'user_role' => $user?->role,
            'category' => $category,
            'action' => $action,
            'description' => $description,
            'method' => $request?->method(),
            'route_name' => $request?->route()?->getName(),
            'url' => $request?->fullUrl(),
            'ip_address' => $request?->ip(),
            'user_agent' => $request?->userAgent(),
            'status_code' => $properties['status_code'] ?? null,
            'properties' => $properties ?: null,
        ]);
    }
}
