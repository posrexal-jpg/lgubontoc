<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAdminActivity
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($this->shouldLog($request, $response)) {
            $category = $this->categoryFor($request);
            $action = $this->actionFor($request);

            ActivityLog::record(
                $category,
                $action,
                $this->descriptionFor($request, $category, $action),
                $request,
                [
                    'status_code' => $response->getStatusCode(),
                    'record_id' => $request->route('id') ?? $request->route('user')?->id ?? $request->input('id'),
                ]
            );
        }

        return $response;
    }

    private function shouldLog(Request $request, Response $response): bool
    {
        if (! $request->user() || ! str_starts_with($request->path(), 'admin')) {
            return false;
        }

        if (str_starts_with((string) $request->route()?->getName(), 'admin.logs.')) {
            return false;
        }

        if ($response->getStatusCode() >= 400) {
            return true;
        }

        return ! $request->isMethod('GET') || str_contains($request->path(), '/delete/');
    }

    private function categoryFor(Request $request): string
    {
        $routeName = (string) $request->route()?->getName();
        $path = $request->path();

        return match (true) {
            str_starts_with($routeName, 'admin.users.') || str_starts_with($path, 'admin/users') => 'Users',
            str_starts_with($routeName, 'admin.profile.') || str_starts_with($path, 'admin/profile') => 'Profile',
            str_starts_with($routeName, 'admin.carousel') || str_starts_with($routeName, 'admin.hero-images') || str_starts_with($routeName, 'admin.header-banner') || str_starts_with($path, 'admin/home') => 'Homepage',
            str_starts_with($routeName, 'admin.aboutus.') => 'About Us',
            str_starts_with($routeName, 'admin.government.') => 'Government',
            str_starts_with($routeName, 'admin.newsandupdates.') => 'News and Updates',
            str_starts_with($routeName, 'admin.transparency.') => 'Transparency',
            str_starts_with($routeName, 'admin.services.') => 'Services',
            str_starts_with($routeName, 'admin.transactions.') => 'Transactions',
            str_starts_with($routeName, 'admin.tourism.') => 'Tourism',
            str_starts_with($routeName, 'admin.careers.') => 'Careers',
            str_starts_with($routeName, 'admin.others.downloadableforms') => 'Downloadable Forms',
            str_starts_with($routeName, 'admin.others.gallery') => 'Gallery',
            str_starts_with($routeName, 'admin.others.memorandom') => 'Memorandum',
            default => 'Admin',
        };
    }

    private function actionFor(Request $request): string
    {
        $path = $request->path();

        return match (true) {
            str_contains($path, '/delete/') => 'Delete',
            $request->isMethod('POST') && (str_contains($path, '/edit/') || $request->filled('id')) => 'Update',
            $request->isMethod('PUT') || $request->isMethod('PATCH') => 'Update',
            $request->isMethod('POST') => 'Create',
            default => 'Access',
        };
    }

    private function descriptionFor(Request $request, string $category, string $action): string
    {
        $title = $request->input('title') ?: $request->input('name') ?: $request->input('email');
        $target = $title ? " ({$title})" : '';

        return "{$action} activity in {$category}{$target}.";
    }
}
