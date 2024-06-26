<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'blocked',
        'image',
        'verification_code',
        'email_verified',
        'institut',
        'diploma',
        'cover_photo',  // Add cover_photo here
        'date_of_birth',
        'location'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function abonnements()
    {
        return $this->belongsToMany(User::class, 'abonnements', 'user_id', 'abonne_id')->withTimestamps();
    }

    public function getTotalPostsAttribute()
    {
        return $this->publications()->count();
    }

    /**
     * Get the abonnes for the user.
     */
    public function abonnes()
    {
        return $this->hasMany(abonnements::class, 'abonne_id');
    }

    public function sentChats()
    {
        return $this->hasMany(chats::class, 'sender_id');
    }

    public function receivedChats()
    {
        return $this->hasMany(chats::class, 'receiver_id');
    }

    public function notifications()
    {
        return $this->hasMany(notifications::class);
    }
    public function lastPost()
    {
        return $this->hasOne(Publication::class)->latest();
    }
    public function lastComment()
    {
        return $this->hasOne(Commentaire::class)->latest();
    }
    public function lastFriendAdded()
    {
        return $this->hasOne(abonnements::class, 'abonne_id')->latest();
    }

}
