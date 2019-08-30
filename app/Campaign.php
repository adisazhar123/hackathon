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

    public function items() {
        return $this->hasMany('App\CampaignItem', 'campaigns_id');
    }

    public function contributes() {
        return $this->hasMany('App\Contribution', 'campaigns_id');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'users_id');
    }
}
