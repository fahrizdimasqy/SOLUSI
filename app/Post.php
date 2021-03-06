<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Topic;
use App\Comment;

class Post extends Model
{
    protected $fillable = ['slug', 'title', 'content', 'user_id', 'topic_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function topic() {
        return $this->belongsTo(Topic::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function setTitleAttribute($value) {
        if (! $this->exist) {
            $this->attributes['slug'] = str_slug($value);
            $this->attributes['title'] = $value;
        }
    }

    public function getImageAttribute()
    {
        $path = !empty($this->attributes['image']) && file_exists(public_path('\images\post')) ? asset($this->attributes['image']) : false;
        return $path;
    }

    public function getThumbnailAttribute()
    {
        $path = !empty($this->attributes['thumbnail']) && file_exists(public_path('\images\post')) ? asset($this->attributes['thumbnail']) : false;
        return $path;
    }
}
