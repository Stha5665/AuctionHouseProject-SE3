<?php

namespace App\Models;

use App\Traits\generateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalogue extends Model
{
    use HasFactory, generateUuid, SoftDeletes;

    protected $fillable = ['title', 'lot_number', 'description', 'is_archived', 'auction_id', 'item_id', 'estimated_price'];

    public function auction():BelongsTo{
        return $this->belongsTo(Auction::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
