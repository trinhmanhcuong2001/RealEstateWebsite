<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageDescription extends Model
{
    use HasFactory;

    protected $table = 'image_description';
    protected $fillable = [
        'property_id', 'image_url'
    ];
}
