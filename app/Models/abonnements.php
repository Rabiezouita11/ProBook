<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abonnements extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'abonne_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation "belongs to" avec le modèle User (utilisateur qui est abonné à l'utilisateur)
    public function abonne()
    {
        return $this->belongsTo(User::class, 'abonne_id');
    }
}
