<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'color',
        'icon',
        'users_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }

    public function notes(){
        return $this->hasMany('App\Models\Notes', 'categories_id', 'id');
    }
}
