<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * https://ralphjsmit.com/laravel-eloquent-relationships //check the following for relationship
 * $this->hasOne() // one to one
 * $this->belongsTo() // many to one
 * $this->hasMany() // one to many
 * $this->hasManyThrough(TargetMode, IntermediateModel) // one to many (User has many Posts through Profile)
 * $this->hasOneThrough(TargetMode, IntermediateModel) // one to one (User has one Address through Profile)
 * $this->belongsToMany() // will be added in both tables, many to many (Authnr has Many books, Book has many Authers), 
 * achieved via pivot table (intermediate table)
 */
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

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
