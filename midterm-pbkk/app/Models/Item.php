<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_type',
        'item_condition',
        'description',
        'defects',
        'quantity',
        'image_path',
        // ...
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

