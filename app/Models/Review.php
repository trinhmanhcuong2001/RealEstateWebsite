<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 'user_id', 'comment'
    ];

    public function property(): BelongsTo{
        return $this->belongsTo(Properties::class, 'property_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
