<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'publication_id',
        'contenu',
        
      
    ];
     // Relation "belongs to" avec le modèle Publication
     public function publication()
     {
         return $this->belongsTo(Publication::class);
     }
}
