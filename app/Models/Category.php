<?php

namespace App\Models;

use App\Rules\Filter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory , SoftDeletes;


    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }

    public function scopeFilter(Builder $builder, $filters)
    {

        $builder->when($filters['name'] ?? false, function($builder,$value){
            $builder->where('name', 'LIKE', "%{$value}%");
        });
        $builder->when($filters['status'] ?? false, function($builder,$value){
            $builder->where('status','=', $value);
        });


        // if ($filters['name'] ?? false) {
        //     $builder->where('name', 'LIKE', "%{$filters['name']}%");
        // }
        // if ($filters['status'] ?? false) {
        //     $builder->where('status', '=', $filters['status']);
        // }
    }

    // protected $fillable = [
    //     'name','slug','description','image','status'
    // ];
    protected $guarded = [];

    public static function rules($id = 0)
    {
        return [
            'name' => [
                'required', 'string', 'min:3', 'max:255', "unique:categories,name,$id",
                // function ($attribute, $value, $fails) {
                //     if (strtolower($value) == 'laravel') {
                //         $fails('This name is forbidden!');
                //     }
                // },
                new Filter(['laravel', 'php', 'java']),
            ],
            'image' => 'image|max:1048576',
            'status' => 'in:active,inactive'
        ];
    }
}
