<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
