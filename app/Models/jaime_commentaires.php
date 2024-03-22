<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jaime_commentaires extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'commentaire_id',
    ];
    
    // Relation "belongs to" avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation "belongs to" avec le modèle Commentaire
    public function commentaire()
    {
        return $this->belongsTo(Commentaire::class);
    }
}
