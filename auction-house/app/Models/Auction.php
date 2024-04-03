<?php

namespace App\Models;

use App\Traits\generateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model
{
    use HasFactory,generateUuid, SoftDeletes;

    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'status', 'is_archived', 'address'];

    public function catalogues():HasMany
    {
        return $this->hasMany(Catalogue::class);
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);

    }

}
