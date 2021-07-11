<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'img', 'slug'];

    public $dates = ['published_at'];

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

    public function getBodyPreview()
    {
        return Str::limit($this->body, 50);
    }

    public function createdAtForHumans()
    {
//        return $this->created_at->diffForHumans();
        return $this->published_at->diffForHumans();
    }

    // scope - заготовка
    public function scopeLastLimit($query, $limit = 4)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->limit($limit)->get();
    }

    public function scopeAllPaginate($query, $limit = 4)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate($limit);
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->with('comments', 'tags', 'state')->where('slug', $slug)->firstOrFail();
    }

    public function scopeFindByTag($query, $limit = 4)
    {
        return $query->with('tags', 'state')->orderBy('created_at', 'desc')->paginate($limit);
    }
}
