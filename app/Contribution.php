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

    public function user() {
        return $this->hasOne('App\User', 'users_id');
    }

    public function campaign() {
        return $this->belongsTo('App\Campaign', 'campaigns_id');
    }
}
