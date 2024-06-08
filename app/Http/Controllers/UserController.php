<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class UserController extends Controller
{
    public function userDashboard(){
        
        // Retrieve the latest users with their photos
        $latestUsers = User::orderBy('created_at', 'desc')->take(10)->get();
        return view('user.index', compact('latestUsers'));
        
    }


    
    public function UserLogin(){
        return view('user.user_login');
    } 

    public function UserDestroy(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );
        return redirect('/login')->with($notification);
    }

    public function userProfile(){
        // Get the authenticated user
        $userData = Auth::user();
    
        // Pass the user details to the view
        return view('user.user_profile', compact('userData'));
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        $id = Auth::user()->id;
        $data = User::find($id);

        // Check if a new photo is provided       
        if ($request->hasFile('photo')) {
        // Delete old photo if present
        if ($data->photo) {
            $oldPhotoPath = public_path('upload/user_images/' . $data->photo);
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }
        }
         // Process and resize the new photo
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('photo')->getClientOriginalExtension();
        
            $img = $manager->read($request->file('photo')->getRealPath())->resize(200, 200);
        
            $img->save(public_path('upload/user_images/' . $name_gen));
        
            $data->photo = $name_gen;
        }
        $data->save();
        $notification = [
            'message' => 'Photo Updated Successfully',
            'alert_type' => 'success',
        ];
    
        return response()->json($notification);
    }
    
    public function updateProfile(Request $request)
    {
        try {
            // Validate incoming request
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,' . auth()->id(),
                'phone' => 'required|string|max:20',
                'bio' => 'nullable|string',
                'gender' => 'required|in:male,female',
            ]);
    
            // Get the authenticated user
            $user = Auth::user();
    
            // Check if the user exists
            if ($user) {
                // Update user data
                $user->update($validatedData);
    
                $notification = [
                    'message' => 'Profile Updated Successfully',
                    'alert_type' => 'success',
                ];
    
                // Return JSON response with notification
                return response()->json($notification);
            } else {
                // Create notification array for user not found
                $notification = [
                    'message' => 'User not found!',
                    'alert_type' => 'error',
                ];
    
                // Return JSON response with notification and 404 status code
                return response()->json($notification, 404);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation exceptions
            $errors = $e->validator->errors()->all();
    
            $notification = [
                'message' => 'Validation Error',
                'alert_type' => 'error',
                'errors' => $errors,
            ];
    
            // Return JSON response with validation errors and 422 status code
            return response()->json($notification, 422);
        } catch (\Exception $e) {
            // Handle other exceptions
            $notification = [
                'message' => 'An unexpected error occurred',
                'alert_type' => 'error',
            ];
    
            // Return JSON response with error message and 500 status code
            return response()->json($notification, 500);
        }
    }
    
    

    public function userUpdatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ], [
            'old_password.required' => 'Please input your old password',
        ]);

        $user = auth()->user();

        if (!$user) {
            $notification = [
                'message' => 'User not authenticated',
                'alert_type' => 'error',
            ];

            return response()->json($notification, 401);
        }

        // Check if the old password matches
        if (!Hash::check($request->old_password, $user->password)) {
            $notification = [
                'message' => 'Old password is incorrect',
                'alert_type' => 'error',
            ];

            return response()->json($notification, 400);
        }

        // Attempt to update the password
        try {
            User::where('id', $user->id)->update(['password' => Hash::make($request->new_password)]);

            // Logout the user and regenerate the session
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            $notification = [
                'message' => 'Password successfully changed',
                'alert_type' => 'success',
            ];

            return response()->json($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => 'Failed to update password',
                'alert_type' => 'error',
            ];

            return response()->json($notification, 500);
        }
    }

    


    

}