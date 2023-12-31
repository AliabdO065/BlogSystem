<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['id', 'image', 'parent'];

    public function parents(){
        return $this->belongsTo(Category::class,'parent');
    }

    public function children(){
        return $this->hasMany(Category::class,'parent');
    }
    
}
