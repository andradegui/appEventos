<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function getOwnerNameAttribute(){ //owner_name

        return $this->owner->name;

    }

    // Mutator | Este método salva o campo slug
    public function setTitleAttribute($value){

        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

    public function setStartEventAttribute($value){

        $this->attributes['start_event'] = (\DateTime::createFromFormat('d/m/Y H:i', $value))->format('Y-m-d H:i');

    }
}
