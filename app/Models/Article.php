<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'img', 'slug'];

//    protected $guarded = [];

    //имеет несколько
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    //имеет один
    public function state() {
        return $this->hasOne(State::class);
    }

    //относится ко многим
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
