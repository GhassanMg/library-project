<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'category_id',
    ];

    //Attributes
    public function getImageAttribute($key)
    {
        if (is_null($key)) {
            return null;
        }

        return url('/').'/'.$key;
        //return url('/').$key;
    }

    //Relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}