<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'categories_id',
        'users_id',
    ];

    public function categories(){
        return $this->belongsTo('App\Models\Categories');
    }

    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
