<?php

namespace App\Models;

use App\Traits\generateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemCategory extends Model
{
    use HasFactory, generateUuid, SoftDeletes;

    protected $fillable = [
        'category_name', 'used_medium', 'used_material', 'weight',
        'is_framed', 'item_id', 'image_type_of', 'dimension'
    ];

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
