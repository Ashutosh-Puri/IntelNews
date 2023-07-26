<?php

namespace App\Models;

use App\Models\Reviews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsPost extends Model{

    use HasFactory;

    protected $guarded = [];



    public function categoryRelation(){

        return $this->belongsTo(Category::class,'category_id','id');

    }


    public function subcategoryRelation(){

        return $this->belongsTo(Subcategory::class,'subcategory_id','id');

    }


    public function userRelation(){

        return $this->belongsTo(User::class,'user_id','id');

    }

    public function reviews() {
        return $this->hasMany(Reviews::class);
    }

}
