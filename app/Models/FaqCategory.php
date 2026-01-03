<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $fillable = ['name'];

    public function questions(){
        return $this->belongsToMany(FaqQuestion::class, 'category_question');
    }
}
