<?php

namespace App\Http\Controllers;

use App\Mail\UserBlockedNotification;
use App\Models\abonnements;
use App\Models\Commentaire;
use App\Models\jaime_commentaires;
use App\Models\jaime_publications;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {

        $domainData = Publication::select('domain', DB::raw('count(*) as count'))
        ->groupBy('domain')
        ->get()
        ->map(function($item) {
            $item->percentage = ($item->count / Publication::count()) * 100;
            return $item;
        });
        // Count records in each table
        $abonnementsCount = abonnements::count();
        $commentairesCount = Commentaire::count();
        $jaimeCommentairesCount = jaime_commentaires::count();
        $jaimePublicationsCount = jaime_publications::count();
        $publicationsCount = Publication::count();
        $userCount = User::where('role', 'utilisateur')->count();

        return view('backoffice.home.index', [
            'abonnementsCount' => $abonnementsCount,
            'commentairesCount' => $commentairesCount,
            'jaimeCommentairesCount' => $jaimeCommentairesCount,
            'jaimePublicationsCount' => $jaimePublicationsCount,
            'publicationsCount' => $publicationsCount,
            'userCount' => $userCount,
            'domainData' => $domainData
        ]);
    }

    public function showPageUtilisateurs()
    {
        // Retrieve users with role 'utilisateur' with pagination
        $utilisateurs = User::where('role', 'utilisateur')->paginate(6);  // Change 10 to the number of users per page you desire

        return view('backoffice.utilisateurs.index', ['utilisateurs' => $utilisateurs]);
    }

    public function toggleBlock($id)
    {
        $user = User::findOrFail($id);
        $user->blocked = !$user->blocked;  // Toggle the blocked status
        $user->save();
        $action = $user->blocked ? 'blocked' : 'unblocked';
        $message = "User '{$user->name}' has been successfully {$action}.";

        // Send email notification to the user
        Queue::push(function ($job) use ($user, $action) {
            Mail::to($user->email)->send(new UserBlockedNotification($user, $action));
            $job->delete();
        });
        // Return JSON response with the message
        return response()->json(['message' => $message]);
    }

    public function showProfile()
    {
        return view('backoffice.Profile.index');
    }

    public function updateEmailName(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'email' => 'required|email',
        'name' => 'required|string|max:255',
    ]);

    // Get the authenticated user
    $user = Auth::user();

    // Update the user's email and name
    $user->email = $validatedData['email'];
    $user->name = $validatedData['name'];

    // Save the updated user to the database
    $user->save();

    // Show a success toast message
    return response()->json(['message' => 'Email and name updated successfully.']);
}

public function updatePassword(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'current_password' => 'required',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Check if the current password matches the authenticated user's password
    if (!Hash::check($request->current_password, Auth::user()->password)) {
        return response()->json([
            'message' => 'The given data was invalid.',
            'errors' => [
                'current_password' => ['Current password is incorrect.'],
            ],
        ], 422);
    }

    // Update the user's password
    $user = Auth::user();
    $user->password = Hash::make($request->password);
    $user->save();

    // Return a success response
    return response()->json(['message' => 'Password updated successfully.']);
}
}
