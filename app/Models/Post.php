<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'image', 'category_id', 'user_id'];
    
    public function getFormattedDate($col, $format = 'd-m-Y H:i:s') 
    {
        return Carbon::create($this->$col)->format($format);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
