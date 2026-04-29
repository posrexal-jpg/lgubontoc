<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserManagementController extends Controller
{
    public static function availablePermissions(): array
    {
        return collect(self::permissionGroups())
            ->flatMap(fn ($group) => $group)
            ->all();
    }

    public static function permissionGroups(): array
    {
        return [
            'Home' => [
                'home' => 'Banners, hero images, and homepage items',
            ],
            'Government' => [
                'government' => 'Government officials and legislative',
            ],
            'About Us' => [
                'about' => 'About us pages',
                'careers' => 'Careers',
            ],
            'News and Updates' => [
                'news' => 'News and announcements',
            ],
            'Services and Transactions' => [
                'services' => 'Services',
                'transaction_links' => 'Transaction menu links',
            ],
            'Transparency' => [
                'transparency' => 'Transparency and FDP reports',
                'downloadable_forms' => 'Downloadable forms',
            ],
            'Tourism and Media' => [
                'tourism' => 'Tourism',
                'gallery' => 'Gallery',
                'memorandum' => 'Memorandum',
            ],
            'Administration' => [
                'activity_logs' => 'Activity logs and reports',
            ],
        ];
    }

    public function index()
    {
        return view('admin.users.index', [
            'users' => User::orderBy('name')->get(),
            'permissions' => self::availablePermissions(),
            'permissionGroups' => self::permissionGroups(),
        ]);
    }

    public function create()
    {
        return view('admin.users.create', [
            'permissions' => self::availablePermissions(),
            'permissionGroups' => self::permissionGroups(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'role' => $data['role'],
            'permissions' => $this->permissionsForRole($data['role'], $data['permissions'] ?? []),
            'password' => $data['password'],
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Account created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'permissions' => self::availablePermissions(),
            'permissionGroups' => self::permissionGroups(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $this->validatedData($request, $user->id);

        $payload = [
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'role' => $data['role'],
            'permissions' => $this->permissionsForRole($data['role'], $data['permissions'] ?? []),
        ];

        if (! empty($data['password'])) {
            $payload['password'] = $data['password'];
        }

        $user->update($payload);

        return redirect()->route('admin.users.index')->with('success', 'Account updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->is(auth()->user())) {
            return redirect()->route('admin.users.index')->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Account deleted successfully.');
    }

    private function validatedData(Request $request, ?int $userId = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($userId)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($userId)],
            'role' => ['required', 'in:admin,content_creator'],
            'permissions' => ['array'],
            'permissions.*' => ['string', 'in:' . implode(',', array_keys(self::availablePermissions()))],
            'password' => [$userId ? 'nullable' : 'required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    private function permissionsForRole(string $role, array $permissions): array
    {
        if ($role === 'admin') {
            return ['*'];
        }

        return array_values(array_intersect($permissions, array_keys(self::availablePermissions())));
    }
}
