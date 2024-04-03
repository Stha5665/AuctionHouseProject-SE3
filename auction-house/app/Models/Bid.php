<?php

namespace App\Models;

use App\Traits\generateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bid extends Model
{
    use HasFactory, generateUuid;

    protected $fillable = ['amount', 'description', 'status', 'auction_id', 'user_id', 'item_id', 'type'];

    public function auction(): BelongsTo
    {
        return $this->belongsTo(Auction::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

}
