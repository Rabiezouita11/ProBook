<?php

namespace App\Http\Controllers;

use App\Events\PrivateChannelUser;
use App\Mail\VerificationCodeMail;
use App\Models\Commentaire;
use App\Models\jaime_publications;
use App\Models\notifications;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $currentUser = auth()->user();

            $followingUsers = User::whereHas('abonnes', function ($query) use ($currentUser) {
                $query->where('user_id', $currentUser->id);
            })->with('abonnes');

            // Users who are following the current user
            $followers = User::whereHas('abonnements', function ($query) use ($currentUser) {
                $query->where('abonne_id', $currentUser->id);
            })->with('abonnements');

            // Combine both queries using union
            $followingUsers = $followingUsers->union($followers)->get();

            $followingCount = $followingUsers->count();

            return view('frontoffice.home.index', [
                'followingCount' => $followingCount
            ]);
        }

        // If user is not authenticated, simply return the view without passing followingCount
        return view('frontoffice.home.index');
    }

    public function enter_verification_code()
    {
        return view('validationEmail.index');
    }

    public function fetch()
    {
        // Retrieve notifications for the authenticated user
        $notifications = notifications::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->limit(10)  // Limit to 10 latest notifications
            ->get();

        return response()->json(['notifications' => $notifications]);
    }

    public function verify(Request $request)
    {
        // Validate the verification code
        $request->validate([
            'verification_code' => 'required|string|min:6|max:6',  // Assuming the verification code is 6 characters long
        ]);

        // Get the verification code from the request
        $verificationCode = $request->input('verification_code');

        // Get the logged-in user
        $user = auth()->user();

        // Check if the verification code matches
        if ($user->verification_code === $verificationCode) {
            // Mark the email as verified
            $user->verification_code = null;

            $user->email_verified = true;
            $user->save();

            // Redirect the user to the home page or wherever appropriate
            return response()->json([
                'status' => 'success',
                'message' => 'Email verification successful!',
            ]);
        } else {
            // Verification code does not match
            return response()->json([
                'status' => 'error',
                'errors' => ['verification_code' => ['Invalid verification code. Please try again.']],
            ], 422);
        }
    }

    public function resend(Request $request)
    {
        $waitTime = 60;  // Wait time in seconds
        $currentTime = Carbon::now();
        // Check if the user has already requested to resend the code recently
        if (session()->has('code_resend_time')) {
            $lastResendTime = session('code_resend_time');
            $secondsSinceLastResend = $currentTime->diffInSeconds($lastResendTime);

            // Check if the time elapsed since the last resend is less than the desired interval
            if ($secondsSinceLastResend < $waitTime) {
                $remainingTime = $waitTime - $secondsSinceLastResend;
                return response()->json([
                    'status' => 'error',
                    'message' => 'Please wait for ' . $remainingTime . ' seconds before resending the code again.'
                ], 429);  // Return 429 status code for too many requests
            }
        }
        // If the time elapsed is more than 60 seconds or it's the first request, proceed with resending the code
        $verificationCode = Str::random(6);  // Generate a new verification code
        $user = auth()->user();

        // Update the user's verification code in the database
        $user->verification_code = $verificationCode;
        $user->save();

        // Store the current time in session to track the last resend request time
        $request->session()->put('code_resend_time', now());

        // Send the verification code via email (queue it for asynchronous processing if needed)
        Queue::push(function ($job) use ($user, $verificationCode) {
            Mail::to($user->email)->send(new VerificationCodeMail($user, $verificationCode));
            $job->delete();
        });
        return response()->json([
            'status' => 'success',
            'message' => 'Verification code resent successfully!',
        ]);
    }

    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|max:2048',  // Maximum file size of 2MB
        ]);

        $imageName = null;
        if ($request->file('image')) {
            // Check if the 'public/users' folder exists, if not, create it
            $uploadPath = public_path('users');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }

            $imageName = time() . '.' . $request->file('image')->extension();  // Generate unique filename
            $request->file('image')->move($uploadPath, $imageName);  // Move uploaded file to 'public/users' folder
            Auth::user()->update(['image' => $imageName]);
            return response()->json(['success' => true, 'message' => 'Image uploaded successfully.']);
        }

        // Return error response if file is not uploaded
        return response()->json(['success' => false, 'message' => 'Image upload failed.'], Response::HTTP_BAD_REQUEST);
    }

    public function updateProfile(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'institute' => 'nullable|string|max:255',
            'diploma' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|max:2048',
            'cover_photo' => 'nullable|image|max:2048',
        ]);

        // Get the current authenticated user
        $user = Auth::user();

        // Update user data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->institut = $request->institute;
        $user->diploma = $request->diploma;

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $imageName = time() . '.' . $request->file('profile_image')->extension();
            $uploadPath = public_path('users');
            $request->file('profile_image')->move($uploadPath, $imageName);
            $user->image = $imageName;
        }

        // Handle cover photo upload
        if ($request->hasFile('cover_photo')) {
            $imageName = time() . '.' . $request->file('cover_photo')->extension();
            $uploadPath = public_path('cover_photos');
            $request->file('cover_photo')->move($uploadPath, $imageName);
            $user->cover_photo = $imageName;
        }

        // Save the updated user data
        $user->save();

        // Return a JSON response for the toast message
        return response()->json(['message' => 'Profile updated successfully']);
    }

    public function uploadCoverPhoto(Request $request)
    {
        $request->validate([
            'cover_photo' => 'required|image|max:2048',  // Maximum file size of 2MB
        ]);

        $imageName = null;
        if ($request->file('cover_photo')) {
            // Check if the 'public/users' folder exists, if not, create it
            $uploadPath = public_path('cover_photos');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }

            $imageName = time() . '.' . $request->file('cover_photo')->extension();  // Generate unique filename
            $request->file('cover_photo')->move($uploadPath, $imageName);  // Move uploaded file to 'public/users' folder
            Auth::user()->update(['cover_photo' => $imageName]);
            return response()->json(['success' => true, 'message' => 'Cover photo uploaded successfully.']);
        }

        // Return error response if file is not uploaded
        return response()->json(['success' => false, 'message' => 'Cover photo upload failed.'], Response::HTTP_BAD_REQUEST);
    }

    public function changePassword(Request $request)
    {
        // Validate the request data
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|string|min:8|different:currentPassword',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        // Get the current authenticated user
        $user = Auth::user();

        // Verify if the current password matches the one provided
        if (!Hash::check($request->currentPassword, $user->password)) {
            return response()->json(['message' => 'The current password is incorrect'], 422);
        }

        // Update the user's password
        $user->password = Hash::make($request->newPassword);
        $user->save();

        // Return a success response
        return response()->json(['message' => 'Password changed successfully']);
    }

    public function store(Request $request)
    {
        // Validate the form data

        // Store the new publication in the database
        $publication = new Publication();
        $publication->user_id = auth()->id();
        $publication->contenu = $request['contenu'];
        $publication->story = $request->has('story') ? true : false;
        $publication->Activity_Feed = $request->has('Activity_Feed') ? true : false;

        // Handle image upload if provided
        $imageName = null;
        if ($request->hasFile('image')) {
            // Check if the 'public/images' folder exists, if not, create it
            $uploadPath = public_path('images');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }

            $imageName = time() . '.' . $request->file('image')->extension();  // Generate unique filename
            $request->file('image')->move($uploadPath, $imageName);  // Move uploaded file to 'public/images' folder
        }

        $publication->image = $imageName;  // Assign the image name to the publication model

        $publication->save();

        // Determine the success message based on the scenario
        if ($publication->story && $publication->Activity_Feed) {
            $message = 'Publication and story created successfully!';
        } elseif ($publication->story) {
            $message = 'Story created successfully!';
        } elseif ($publication->Activity_Feed) {
            $message = 'Publication created successfully!';
        } else {
            $message = 'Publication created successfully!';
        }

        // Redirect to a success page or back to the creation form with success message
        return redirect()->back()->with('success', $message);
    }

    public function storeUserAbonner(Request $request)
    {
        // Validate the form data

        // Store the new publication in the database
        $publication = new Publication();
        $publication->user_id = auth()->id();
        $publication->contenu = $request['contenu'];
        $publication->user_abonner_id = $request['userprofile'];

        $publication->story = $request->has('story') ? true : false;
        $publication->Activity_Feed = $request->has('Activity_Feed') ? true : false;

        // Handle image upload if provided
        $imageName = null;
        if ($request->hasFile('image')) {
            // Check if the 'public/images' folder exists, if not, create it
            $uploadPath = public_path('images');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }

            $imageName = time() . '.' . $request->file('image')->extension();  // Generate unique filename
            $request->file('image')->move($uploadPath, $imageName);  // Move uploaded file to 'public/images' folder
        }

        $publication->image = $imageName;  // Assign the image name to the publication model

        $publication->save();
        if ($publication->user_abonner_id) {
            // Get the user profile
            $userProfile = User::find($publication->user_abonner_id);

            // Send notification
            $notification = new notifications();
            $notification->user_id = $userProfile->id;
            $notification->data = auth()->user()->name . ' posted a publication on your profile';
            $notification->username =  auth()->user()->name;  // Use the name of the user profile
            $notification->imageUrl = auth()->user()->image;  // Use the image of the user profile
            $notification->save();

            // Dispatch event
            event(new PrivateChannelUser($notification->data, $notification->username, $notification->user_id, $notification->imageUrl));
        }

        // Determine the success message based on the scenario
        if ($publication->story && $publication->Activity_Feed) {
            $message = 'Publication and story created successfully!';
        } elseif ($publication->story) {
            $message = 'Story created successfully!';
        } elseif ($publication->Activity_Feed) {
            $message = 'Publication created successfully!';
        } else {
            $message = 'Publication created successfully!';
        }

        // Redirect to a success page or back to the creation form with success message
        return redirect()->back()->with('success', $message);
    }

    public function likePublication(Request $request)
    {
        $existingLike = jaime_publications::where('user_id', auth()->id())
            ->where('publication_id', $request->publication_id)
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            $message = 'Publication unliked.';
        } else {
            jaime_publications::create([
                'user_id' => auth()->id(),
                'publication_id' => $request->publication_id,
            ]);
            $message = 'Publication liked.';

            // Send notification to the owner of the publication
            $publicationOwner = Publication::find($request->publication_id)->user;
            if ($publicationOwner->id != auth()->id()) {  // Don't send notification if liking own publication
                $notification = new notifications();
                $notification->user_id = $publicationOwner->id;
                $notification->data = auth()->user()->name . ' liked your publication';
                $notification->username = auth()->user()->name;
                $notification->imageUrl = auth()->user()->image;  // Adjust this according to your user model
                $notification->save();

                event(new PrivateChannelUser($notification->data, $notification->username, $notification->user_id, $notification->imageUrl));
            }
        }

        $likeCount = jaime_publications::where('publication_id', $request->publication_id)->count();

        return response()->json(['message' => $message, 'like_count' => $likeCount]);
    }

    public function addComment(Request $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'You need to be authenticated to add a comment',
            ], 401); // Unauthorized status code
        }
    
        // Validate the incoming request
        $request->validate([
            'publication_id' => 'required|exists:publications,id',
            'content' => 'required|string|max:255',
        ]);

        // Create a new comment
        $comment = new Commentaire();
        $comment->publication_id = $request->publication_id;
        $comment->contenu = $request->content;
        $comment->user_id = auth()->id();
        $comment->save();

        // Send notification to the owner of the publication
        $publicationOwner = Publication::find($request->publication_id)->user;
        if ($publicationOwner->id != auth()->id()) {  // Don't send notification if commenting own publication
            $notification = new notifications();
            $notification->user_id = $publicationOwner->id;
            $notification->data = auth()->user()->name . ' commented on your publication';
            $notification->username = auth()->user()->name;
            $notification->imageUrl = auth()->user()->image;  // Adjust this according to your user model
            $notification->save();

            event(new PrivateChannelUser($notification->data, $notification->username, $notification->user_id, $notification->imageUrl));
        }

        // Get the total number of comments for the publication
        $totalComments = Commentaire::where('publication_id', $request->publication_id)->count();

        // You can return the newly created comment in the response if needed
        return response()->json([
            'success' => true,
            'comment' => $comment,
            'publicationId' => $request->publication_id,  // Include the publication ID in the response
            'totalComments' => $totalComments,
            'message' => 'Comment added successfully',
        ]);
    }

    public function getComments($publicationId)
    {
        $publication = Publication::findOrFail($publicationId);
        $comments = $publication->commentaires()->with('user')->orderBy('created_at', 'desc')->get();
        return response()->json(['comments' => $comments]);
    }

    public function getCommentsCount($publicationId)
    {
        $publication = Publication::findOrFail($publicationId);
        $commentsCount = $publication->commentaires()->count();  // Assuming you have a relationship set up between Publication and Comment models

        return response()->json(['commentsCount' => $commentsCount]);
    }

    public function getLikesCount($publicationId)
    {
        $publication = Publication::findOrFail($publicationId);
        $likesCount = $publication->jaime_publications()->count();  // Assuming you have a relationship set up between Publication and Like models

        return response()->json(['likesCount' => $likesCount]);
    }

    public function destroy($publicationId, $commentId)
    {
        $comment = Commentaire::find($commentId);

        if (!$comment) {
            return response()->json(['success' => false, 'message' => 'Comment not found'], 404);
        }

        // Check if the comment belongs to the specified publication
        if ($comment->publication_id != $publicationId) {
            return response()->json(['success' => false, 'message' => 'Comment does not belong to the specified publication'], 404);
        }

        // Check if the user is authorized to delete the comment (optional)

        $comment->delete();

        // Retrieve the total count of comments for the publication after deletion
        $totalComments = Commentaire::where('publication_id', $publicationId)->count();

        // Return success response along with the total count of comments
        return response()->json(['success' => true, 'message' => 'Comment deleted successfully', 'totalComments' => $totalComments]);
    }

    public function update(Request $request)
    {
        // Find the comment by its ID
        $comment = Commentaire::findOrFail($request->comment_id);

        // Update the comment content
        $comment->contenu = $request->input('content');
        $comment->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Comment updated successfully!');
    }

    public function destroyPublication($id)
    {
        // Find the publication
        $publication = Publication::findOrFail($id);

        // Check if the authenticated user owns the publication
        if (auth()->user()->id !== $publication->user_id) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Delete the publication
        $publication->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function updatePublication(Request $request)
    {
        // Validate the request data
        $request->validate([
            'publication_id' => 'required|exists:publications,id',
            'contenu' => 'required|string',
        ]);

        // Find the publication by ID
        $publication = Publication::findOrFail($request->input('publication_id'));

        // Update the publication with the new content
        $publication->update([
            'contenu' => $request->input('contenu'),
        ]);

        // Redirect back or return a response as needed
        return redirect()->back()->with('success', 'Publication updated successfully.');
    }

    public function followUser(Request $request, $userId)
    {
        // Get the user to follow
        $userToFollow = User::find($userId);

        if (!$userToFollow) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $currentUserId = auth()->id();  // Get the ID of the authenticated user
        $userToFollow->abonnements()->attach($userId, [
            'abonne_id' => $currentUserId,  // The current user's ID
            'user_id' => $userToFollow->id  // The user being followed's ID
        ]);

        $notification = new notifications();
        $notification->user_id = $userId;
        $notification->data = auth()->user()->name . ' is now following you';
        $notification->username = auth()->user()->name;
        $notification->imageUrl = auth()->user()->image;  // Adjust this according to your user model
        $notification->save();

        $message = auth()->user()->name . ' is now following you';
        $username = auth()->user()->name;
        $userIdReceiver = $userToFollow->id;
        $imageUrl = auth()->user()->image;  // Assuming you have a field named 'image_url' in your user model
        event(new PrivateChannelUser($message, $username, $userIdReceiver, $imageUrl));

        return response()->json(['message' => 'You followed the user successfully'], 200);
    }

    public function unfollow(Request $request, $userId)
    {
        // Get the ID of the authenticated user
        $currentUserId = auth()->id();

        // Delete records from the abonnements table where either user_id or abonne_id matches
        DB::table('abonnements')
            ->where(function ($query) use ($currentUserId, $userId) {
                $query
                    ->where('user_id', $userId)
                    ->where('abonne_id', $currentUserId);
            })
            ->orWhere(function ($query) use ($currentUserId, $userId) {
                $query
                    ->where('user_id', $currentUserId)
                    ->where('abonne_id', $userId);
            })
            ->delete();

        return response()->json(['message' => 'You unfollowed the user successfully'], 200);
    }

    public function show(User $user)
    {
        $currentUserId = auth()->id();

        $followingUsers = User::whereHas('abonnes', function ($query) use ($user) {
            $query->where('user_id', auth()->id());
        })->with('abonnes');

        // Users who are following the current user
        $followers = User::whereHas('abonnements', function ($query) use ($user) {
            $query->where('abonne_id', auth()->id());
        })->with('abonnements');

        // Combine both queries using union
        $followingUsers = $followingUsers->union($followers)->get();

        $followingCount = $followingUsers->count();
        $mostLikedPost = Publication::withCount('jaime_publications')
            ->where('user_id', $user->id)  // Filter by user ID
            ->orderByDesc('jaime_publications_count')
            ->first();

        if (auth()->check()) {
            $suggestedUsers = User::where('role', 'utilisateur')
                ->whereNotIn('id', auth()->user()->abonnements()->pluck('abonne_id'))
                ->whereNotIn('id', auth()->user()->abonnes()->pluck('user_id'))  // Exclude users whom the current user is following
                ->where('id', '!=', auth()->id())
                ->get();
        } else {
            // If user is not logged in, show all users
            $suggestedUsers = User::where('role', 'utilisateur')->get();
        }

        $publications = Publication::with('user', 'user_abonner')
            ->where(function ($query) use ($user) {
                $query
                    ->where('user_id', $user->id)
                    ->orWhere('user_abonner_id', $user->id);
            })
            ->where('Activity_Feed', true)
            ->orderBy('created_at')
            ->get();

        return view('frontoffice.ProfileUserConnected.index', [
            'user' => $user,
            'followingCount' => $followingCount,
            'mostLikedPost' => $mostLikedPost,
            'suggestedUsers' => $suggestedUsers,
            'publications' => $publications,
        ]);
    }

    public function showProfileUser()
    {
        $currentUser = auth()->user();
        $userId = auth()->id();

        $publications = Publication::where('Activity_Feed', true)
            ->where(function ($query) use ($userId) {
                $query
                    ->where('user_id', $userId)
                    ->whereNull('user_abonner_id');
            })
            ->orWhere(function ($query) use ($userId) {
                $query
                    ->where('user_abonner_id', $userId)
                    ->whereNotNull('user_id');
            })
            ->latest()
            ->get();

        $suggestedUsers = User::where('role', 'utilisateur')
            ->whereNotIn('id', $currentUser->abonnements()->pluck('abonne_id'))
            ->whereNotIn('id', $currentUser->abonnes()->pluck('user_id'))  // Exclude users whom the current user is following
            ->where('id', '!=', $currentUser->id)
            ->get();
        $followingUsers = User::whereHas('abonnes', function ($query) use ($currentUser) {
            $query->where('user_id', $currentUser->id);
        })->with('abonnes');

        // Users who are following the current user
        $followers = User::whereHas('abonnements', function ($query) use ($currentUser) {
            $query->where('abonne_id', $currentUser->id);
        })->with('abonnements');

        // Combine both queries using union
        $followingUsers = $followingUsers->union($followers)->get();

        $followingCount = $followingUsers->count();

        return view('frontoffice.profile.index', compact(
            'publications',
            'suggestedUsers',
            'followingUsers',
            'followingCount',
        ));
    }
}
