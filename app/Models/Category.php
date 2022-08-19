<?php

namespace App\Models;

use App\Rules\Filter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

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
                new Filter('laravel'),
            ],
            'image' => 'image|max:1048576',
            'status' => 'in:active,inactive'
        ];
    }
}
