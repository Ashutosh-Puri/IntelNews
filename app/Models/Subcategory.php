<?php

namespace App\Models;

use App\Models\Category;
use App\Models\NewsPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function category(){

        return $this->belongsTo(Category::class,'category_id','id');

    }

    public function newsPosts() {
        return $this->hasMany(NewsPost::class);
    }

}
