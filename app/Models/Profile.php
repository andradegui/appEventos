<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['about', 'phone', 'social_networks'];

    public function user(){

        return $this->belongsTo(User::class); // 1:1 pertence a User o campo user_id

    }
}
