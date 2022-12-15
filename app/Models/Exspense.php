<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Exspense extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function rCategory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
