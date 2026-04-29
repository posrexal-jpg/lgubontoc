<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['q', 'category', 'role', 'action', 'date_from', 'date_to']);

        $logs = ActivityLog::query()
            ->when($filters['q'] ?? null, function ($query, $search) {
                $query->where(function ($builder) use ($search) {
                    $builder->where('description', 'like', "%{$search}%")
                        ->orWhere('user_name', 'like', "%{$search}%")
                        ->orWhere('user_email', 'like', "%{$search}%")
                        ->orWhere('route_name', 'like', "%{$search}%")
                        ->orWhere('url', 'like', "%{$search}%");
                });
            })
            ->when($filters['category'] ?? null, fn ($query, $category) => $query->where('category', $category))
            ->when($filters['role'] ?? null, fn ($query, $role) => $query->where('user_role', $role))
            ->when($filters['action'] ?? null, fn ($query, $action) => $query->where('action', $action))
            ->when($filters['date_from'] ?? null, fn ($query, $date) => $query->whereDate('created_at', '>=', $date))
            ->when($filters['date_to'] ?? null, fn ($query, $date) => $query->whereDate('created_at', '<=', $date))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.logs.index', [
            'logs' => $logs,
            'filters' => $filters,
            'categories' => ActivityLog::query()->select('category')->distinct()->orderBy('category')->pluck('category'),
            'categoryCounts' => ActivityLog::query()
                ->selectRaw('category, count(*) as total')
                ->groupBy('category')
                ->orderBy('category')
                ->pluck('total', 'category'),
            'actions' => ActivityLog::query()->select('action')->distinct()->orderBy('action')->pluck('action'),
            'roles' => User::query()->select('role')->distinct()->whereNotNull('role')->orderBy('role')->pluck('role'),
        ]);
    }
}
