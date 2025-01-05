<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'description'];
    protected $with = 'tier';
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function tier()
    {
        return $this->belongsTo(Tier::class);
    }

}
