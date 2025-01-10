<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'tags';
    public function article(){
        return $this->hasMany(Article::class);
    }

   
}
