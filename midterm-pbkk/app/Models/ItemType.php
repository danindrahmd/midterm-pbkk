<?php

// app/Models/ItemType.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    use HasFactory;

    protected $fillable = ['item_type_id', 'user_id', 'description', 'quantity', 'image_paths'];

    
}
