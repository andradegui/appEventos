<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'body', 'start_event', 'slug'];

    protected $dates = ['start_event'];

    public function photos(){ 

        return $this->hasMany(Photo::class); //1:N

    }

    public function categories(){

        return $this->belongsToMany(Category::class); // N:N

    }

    public function owner(){

        return $this->belongsTo(User::class); // 1:1 | 1 evento pertence a 1 User

    }
}
