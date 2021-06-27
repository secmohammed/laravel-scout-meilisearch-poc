<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;
    public function shouldBeSearchable()
    {
        return $this->published === TRUE;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
