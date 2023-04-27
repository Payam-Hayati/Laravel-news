<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function news()
    {
        return $this->hasMany(News::class);
    }
    protected $fillable = ["title"];
    public $timestamps = false;
}
