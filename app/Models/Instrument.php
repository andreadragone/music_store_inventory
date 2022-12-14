<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;
    protected $fillable = ['model', 'brand','quantity','category_id'];

    public function category() 	{
        return $this->belongsTo('App\Models\Instrument');
        }

}
