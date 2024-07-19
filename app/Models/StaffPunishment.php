<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffPunishment extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = ['id'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function type() {
        return $this->belongsTo(Setting::class,'type_sanction_id');
    }

}
