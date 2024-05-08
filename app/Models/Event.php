<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'body', 'start_event', 'slug', 'banner'];

    protected $dates = ['start_event'];
    
    //Métodos de relação com outras models

    public function photos(){ 

        return $this->hasMany(Photo::class); //1:N

    }

    public function categories(){

        return $this->belongsToMany(Category::class); // N:N

    }

    public function owner(){

        return $this->belongsTo(User::class); // 1:1 | 1 evento pertence a 1 User

    }
    
    // Accessors

    public function getOwnerNameAttribute(){ //owner_name

        return $this->owner->name;

    }

    // Mutators 
    
    // Este método salva o campo slug
    public function setTitleAttribute($value){

        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

    public function setStartEventAttribute($value){

        $this->attributes['start_event'] = (\DateTime::createFromFormat('d/m/Y H:i', $value))->format('Y-m-d H:i');

    }

    
    // Metódos criados p/ serem chamados na Controller

    public function getEventsHome($byCategory = null){

        $events = $byCategory ? $byCategory : $this->orderBy('start_event', 'DESC');

        if( $query = request()->query('s') ){

            $events->where('title', 'LIKE', '%' . $query . '%');

        }

        // colocando listagem de eventos com os + recentes com SQL
        // $events->whereRaw('DATE(start_event) >= DATE(NOW())');

        // colocando listagem de eventos com os + recentes com QueryBuilder
        $events->whereDate('start_event', '>=', now());

        return $events;

    }
}
