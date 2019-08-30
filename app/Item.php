<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = [
        'id',
        'title',
        'description',
        'item_url',
        'price',
        'image_path'
    ];

}
