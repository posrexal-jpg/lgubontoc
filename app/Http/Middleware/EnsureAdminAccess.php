<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(403);
        }

        if ($user->isAdmin()) {
            return $next($request);
        }

        $routeName = $request->route()?->getName();

        if ($routeName === 'dashboard' || $routeName === 'admin.dashboard') {
            return $next($request);
        }

        $permission = $this->permissionForRoute($routeName, $request->path());

        if ($permission && $user->hasPermission($permission)) {
            return $next($request);
        }

        abort(403, 'Your account does not have access to this admin module.');
    }

    private function permissionForRoute(?string $routeName, string $path): ?string
    {
        if ($routeName) {
            $permission = match (true) {
                str_starts_with($routeName, 'admin.users.') => 'users',
                str_starts_with($routeName, 'admin.logs.') => 'activity_logs',
                str_starts_with($routeName, 'admin.home') => 'home',
                str_starts_with($routeName, 'admin.carousel') => 'home',
                str_starts_with($routeName, 'admin.hero-images') => 'home',
                str_starts_with($routeName, 'admin.header-banner') => 'home',
                str_starts_with($routeName, 'admin.aboutus.') => 'about',
                str_starts_with($routeName, 'admin.government.') => 'government',
                str_starts_with($routeName, 'admin.careers.') => 'careers',
                str_starts_with($routeName, 'admin.services.') => 'services',
                str_starts_with($routeName, 'admin.transactions.') => 'transaction_links',
                str_starts_with($routeName, 'admin.tourism.') => 'tourism',
                str_starts_with($routeName, 'admin.newsandupdates.') => 'news',
                str_starts_with($routeName, 'admin.transparency.') => 'transparency',
                str_starts_with($routeName, 'admin.others.downloadableforms') => 'downloadable_forms',
                str_starts_with($routeName, 'admin.others.gallery') => 'gallery',
                str_starts_with($routeName, 'admin.others.memorandom') => 'memorandum',
                default => null,
            };

            if ($permission) {
                return $permission;
            }
        }

        return match (true) {
            str_starts_with($path, 'admin/users') => 'users',
            str_starts_with($path, 'admin/logs') => 'activity_logs',
            str_starts_with($path, 'admin/home') => 'home',
            str_starts_with($path, 'admin/carousel') => 'home',
            str_starts_with($path, 'admin/hero-images') => 'home',
            str_starts_with($path, 'admin/header-banner') => 'home',
            str_starts_with($path, 'admin/aboutus') => 'about',
            str_starts_with($path, 'admin/government') => 'government',
            str_starts_with($path, 'admin/careers') => 'careers',
            str_starts_with($path, 'admin/services') => 'services',
            str_starts_with($path, 'admin/transactions') => 'transaction_links',
            str_starts_with($path, 'admin/tourism') => 'tourism',
            str_starts_with($path, 'admin/newsandupdates') => 'news',
            str_starts_with($path, 'admin/transparency') => 'transparency',
            str_starts_with($path, 'admin/others/downloadableforms') => 'downloadable_forms',
            str_starts_with($path, 'admin/others/gallery') => 'gallery',
            str_starts_with($path, 'admin/others/memorandom') => 'memorandum',
            default => null,
        };
    }
}
