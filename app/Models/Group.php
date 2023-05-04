<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_group');
    }

    public function images() : HasMany
    {
        return $this->hasMany(Image::class);
    }
}
