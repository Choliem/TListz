<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tier extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'rank'];
    protected $with = 'post';
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
