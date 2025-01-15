<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id', 'plate', 'brand', 'type', 'capacity', 'price', 'image'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}