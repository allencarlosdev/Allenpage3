<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Inverse one to many relationship
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Many to many relationship
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //One to one polymorphic relationship
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

}
