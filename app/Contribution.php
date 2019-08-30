<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $table = 'contributions';
    protected $fillable = [
        'id',
        'message',
        'amount',
        'users_id',
        'campaigns_id'
    ];
}
