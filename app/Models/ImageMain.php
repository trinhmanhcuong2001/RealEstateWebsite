<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageMain extends Model
{
    use HasFactory;

    protected $table = 'image_main';
    protected $fillable = [
        'property_id', 'image_url'
    ];

}
