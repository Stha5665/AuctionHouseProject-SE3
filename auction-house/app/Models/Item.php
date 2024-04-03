<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\generateUuid;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory, SoftDeletes, generateUuid;

    protected $fillable = [
        'name', 'lot_reference_id', 'status', 'artist_name','produced_year',
        'subject_classification', 'description', 'image_path', 'is_archived',
        'user_id',
    ];

    public function itemCategory(): HasOne
    {
        return $this->hasOne(ItemCategory::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function catalogue(): BelongsTo
    {
        return $this->hasOne(Catalogue::class);
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);

    }

}
