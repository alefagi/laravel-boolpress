<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getFormattedDate($col, $format = 'd-m-Y H:i:s') {
        return Carbon::create($this->$col)->format($format);
    }
}
