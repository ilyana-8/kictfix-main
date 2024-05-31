<?php

namespace App\Http\Controllers\technician;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    // Edit user showProfile
    public function showProfile()
    {
             $user = Auth::guard('technician')->user();
             $title = "User Information";
            return view('technician.profile', compact('title', 'user'));
    }

      // Edit user information/profile
      public function editProfile()
    {
        $title = "Edit Profile";
        return view('technician.editProfile', ['title' => $title, 'user' => Auth::guard('technician')->user()]);

    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('technician')->user();

    // Update user information
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone_number = $request->phone_number;

    // Handle profile image upload (if applicable)
    if ($request->hasFile('profile_image')) {
        $profileImage = $request->file('profile_image');
            $imageName = time() . '.' . $profileImage->extension();
            $profileImage->storeAs('public/profiles', $imageName); // Store image in storage/app/public/profiles directory
            $user->profile_image = $imageName; // Save image name to database
    }

    $user->save();

    return redirect()->route('technician.profile')->with('message', 'Profile updated successfully.');

    }

    public function editPassword()
    {
        $title = "Change Password";
        return view('technician.changePassword', ['title' => $title, 'user' => Auth::guard('technician')->user()]);

    }

    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password1' => 'required|min:6',
        'new_password2' => 'required|same:new_password1',
    ]);

    $user = Auth::guard('technician')->user();

    // Check if the current password matches the one in the database
    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->with('error', 'Current password is incorrect.');
    }

    // Update the user's password
    $user->password = Hash::make($request->new_password1);
    $user->save();

    return redirect()->back()->with('success', 'Password updated successfully.');
}
}
