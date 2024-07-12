<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];


    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }
}
