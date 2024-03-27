<?php

namespace App\Http\Controllers;

use App\Models\abonnements;
use App\Models\Commentaire;
use App\Models\jaime_commentaires;
use App\Models\jaime_publications;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;

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
        // Count records in each table
        $abonnementsCount = abonnements::count();
        $commentairesCount = Commentaire::count();
        $jaimeCommentairesCount = jaime_commentaires::count();
        $jaimePublicationsCount = jaime_publications::count();
        $publicationsCount = Publication::count();
        $userCount = User::where('role', 'utilisateur')->count();

        return view("backoffice.home.index", [
            'abonnementsCount' => $abonnementsCount,
            'commentairesCount' => $commentairesCount,
            'jaimeCommentairesCount' => $jaimeCommentairesCount,
            'jaimePublicationsCount' => $jaimePublicationsCount,
            'publicationsCount' => $publicationsCount,
            'userCount' => $userCount,
        ]);
    }
    public function showPageUtilisateurs()
{
    // Retrieve users with role 'utilisateur' with pagination
    $utilisateurs = User::where('role', 'utilisateur')->paginate(6); // Change 10 to the number of users per page you desire

    return view('backoffice.utilisateurs.index', ['utilisateurs' => $utilisateurs]);
}


public function toggleBlock($id)
{
    $user = User::findOrFail($id);
    $user->blocked = !$user->blocked; // Toggle the blocked status
    $user->save();
    $message = $user->blocked ? "User '{$user->name}' blocked successfully." : "User '{$user->name}' unblocked successfully.";

    // Return JSON response with the message
    return response()->json(['message' => $message]);
}


}
