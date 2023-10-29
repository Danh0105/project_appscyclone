<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssetModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'asset_name',
        'category_model_id',
        'condition',
        'note',
        'date',
        'serial',
        'modelof_manuf_id',
        'supplier_model_id',
        'location_model_id',
        'warranty',
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryModel::class);
    }
    public function modelof_mannuf(): BelongsTo
    {
        return $this->belongsTo(ModelofManuf::class);
    }
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(SupplierModel::class);
    }
    public function location(): BelongsTo
    {
        return $this->belongsTo(LocationModel::class);
    }
}
