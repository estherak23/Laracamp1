<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Camp extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'price',
        //slug auto dari title jadi gak perlu diisi jadi gak dimasukin
        ];

        // public function getIsRegisteredAttribute()
        // {
        //     //kalo gak ada yg login returnya isregister false
        //     if (!Auth::check())
        //     {
        //         return false;
        //     }
        //     //ambil id yg dipilih dan user id dari org yg login kalo ada return true kalo gak false
        //     return Checkout::whereCampId($this->id)->whereUserId(Auth::id())->exists();
        // }
}

