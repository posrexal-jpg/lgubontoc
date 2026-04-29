<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    private function profilePicturePath(?string $filename = null): string
    {
        $path = public_path('uploads/profile-pictures');

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        if (!is_writable($path)) {
            @chmod($path, 0775);
        }

        return $filename ? $path.DIRECTORY_SEPARATOR.$filename : $path;
    }

    public function edit()
    {
        return view('admin.profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('profile_picture')) {
            if (!empty($user->profile_picture) && file_exists($this->profilePicturePath($user->profile_picture))) {
                unlink($this->profilePicturePath($user->profile_picture));
            }

            $file = $request->file('profile_picture');
            $data['profile_picture'] = Str::random(30).'.'.$file->getClientOriginalExtension();
            $file->move($this->profilePicturePath(), $data['profile_picture']);
        }

        $user->update($data);

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => $data['password'],
        ]);

        return redirect()->route('admin.profile.edit')->with('success', 'Password changed successfully.');
    }
}
