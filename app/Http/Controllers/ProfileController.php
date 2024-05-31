<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class ProfileController extends Controller
{
    // Show user profile
    public function showProfile()
    {
        $user = Auth::user();
        $title = "User Information";
        return view('profile', compact('title', 'user'));
    }

    // Edit user profile
    public function editProfile()
    {
        $title = "Edit Profile";
        return view('editProfile', ['title' => $title, 'user' => auth()->user()]);
    }

    // Update user profile
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        // Validate input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:15',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update user information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = date('Ymd') . '_' . Str::random(20) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('profiles', $imageName, 'public');
            $user->profile_image = $imagePath;
        }

        $user->save();

        return redirect()->route('account.profile')->with('success', 'Profile updated successfully.');
    }

    // Edit user password
    public function editPassword()
    {
        $title = "Change Password";
        return view('changePassword', ['title' => $title, 'user' => auth()->user()]);
    }

    // Update user password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|confirmed|min:6|different:current_password',
        ]);

        try {
            $userId = Auth::user()->id;
            $user = User::findOrFail($userId);

            // Check if the current password matches the one in the database
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('error', 'Current password is incorrect.');
            } else {
                // Update the user's password
                $user->update([
                    'password' => Hash::make($request->password),
                ]);

                return redirect()->back()->with('success', 'Password updated successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while submitting the report: ' . $e->getMessage());
        }
    }
}
