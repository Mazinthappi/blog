<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'articles';
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tag(){
        return $this->belongsTo(Tags::class);
    }
    
}
