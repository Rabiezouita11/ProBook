<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jaime_publications extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'publication_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation "belongs to" avec le modèle Publication
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
