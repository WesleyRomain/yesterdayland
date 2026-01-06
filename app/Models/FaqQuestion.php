<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model
{
    protected $fillable=['question','answer'];

    public function categories()
    {
        return $this->belongsToMany(
            FaqCategory::class,
            'category_question',
            'faq_question_id',   // foreign key naar dit model
            'faq_category_id'    // foreign key naar het andere model
        );
    }

}
