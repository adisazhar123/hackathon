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
        'campaigns_id',
        'campaign_item_id'
    ];

    public function user() {
        return $this->belongsTo('App\User', "users_id", 'id');
    }

    public function campaign() {
        return $this->belongsTo('App\Campaign', 'campaigns_id');
    }
}
