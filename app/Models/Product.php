<?php

namespace App\Models;

use App\Models\Scopes\StoreScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected static function booted()
    {
        // static::addGlobalScope('store', function (Builder $builder) {
        //     $user = Auth::user();
        //     if($user->store_id){
        //         $builder->where('store_id', '=', $user->store_id);
        //     }
        // });
        static::addGlobalScope('store', new StoreScope());
    }
}
