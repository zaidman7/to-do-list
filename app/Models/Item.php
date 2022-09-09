<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // protected $with = ['todo', 'progress'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function file() {
        return $this->hasOne(File::class);
    }
}
