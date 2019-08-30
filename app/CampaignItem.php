<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignItem extends Model
{
    protected $table = 'campaign_item';
    protected $fillable = [
        'id',
        'description',
        'quantity',
        'campaigns_id',
        'items_id'
    ];

    public function campaign() {
        return $this->belongsTo('App\Campaign', 'campaigns_id');
    }
}
