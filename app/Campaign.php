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

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeDonation($query)
    {
        return $query->where('campaign_type', 'donation')->with('user');
    }

    public function scopeWishlist($query)
    {
        return $query->where('campaign_type', 'wishlist')->with('user');
    }

    public function scopeItems($query)
    {
        return $query->with('items.item');
    }

    public function items() {
        return $this->hasMany(CampaignItem::class, 'campaign_id', 'id');
    }

    public function contributors() {
        return $this->hasMany('App\Contribution', 'campaigns_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'users_id');
    }
}
