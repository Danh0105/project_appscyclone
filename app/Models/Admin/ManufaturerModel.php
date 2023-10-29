<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufaturerModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'manuf_name',
    ];
}
