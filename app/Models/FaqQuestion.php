<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model
{
    protected $fillable=['question','answer'];

    public function category(){
        return $this->belongsToMany(FaqCategory::class, 'category_question');
    }
}
