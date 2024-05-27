<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contenu',
        'image',
        'user_abonner_id',  // Add the user_abonner_id column here
        'domain'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function jaime_publications()
    {
        return $this->hasMany(jaime_publications::class);
    }
    // Dans le modèle Publication

    public function totalComments()
    {
        return $this->commentaires()->count();
    }

    public function user_abonner()
    {
        return $this->belongsTo(User::class, 'user_abonner_id');
    }
}
