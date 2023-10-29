<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelofManuf extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'model_name',
        'manufaturer_model_id'
    ];
}
