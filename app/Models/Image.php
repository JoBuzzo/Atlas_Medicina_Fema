<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Image extends Model
{
    use HasFactory;


    protected $fillable = [
        'image', 'title', 'description'
    ];

    public function getImageAttribute($image)
    {
        if($image) return asset("storage/images/$image");
        else return null;
    }


    public function group() : BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
