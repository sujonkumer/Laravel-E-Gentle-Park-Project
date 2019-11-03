<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function images(){
        return $this->hasMany(product_image::class);
    }
}
