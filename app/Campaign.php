<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';
    protected $fillable = [
        'title',
        'description',
        'deadline',
        'banner_path',
        'fulfillment_percentage',
        'shortlink',
        'campaign_type',
        'target_amount',
        'status',
        'users_id'
    ];
}
