<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'image_id',
        'status',

    ];


    public function image()
    {
        return $this->belongsTo(File::class);
    }
}
