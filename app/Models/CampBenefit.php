<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\SoftDeletes;

class CampBenefit extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['camp_id',
        'name',
        
        
    ];
}