<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\beLongsTo;

class Properties extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'address', 'price', 'bedroom', 'bathroom','category', 'user_id', 'geom'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function image_main() : hasOne {
        return $this->hasOne(ImageMain::class, 'property_id');
    }
    public function image_description() : hasMany {
        return $this->hasMany(ImageDescription::class, 'property_id');
    }
}
