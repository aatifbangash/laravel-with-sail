<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
class Post extends Model
{
    use HasFactory;

    protected $fillable = ["title", "body"];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
