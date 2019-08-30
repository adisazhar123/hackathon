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
        'campaign_id',
        'item_id',
        'percentage'
    ];

    public function campaign() {
        return $this->belongsTo('App\Campaign', 'campaigns_id');
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function contributors()
    {
        return $this->hasMany(Contribution::class);
    }
}
