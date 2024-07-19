<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function type() {
        return $this->belongsTo(Setting::class,'type_vacation_id');
    }

    public function getDurationAttribute()
    {
        $start = new \DateTime($this->start_date);
        $end = new \DateTime($this->end_date);

        return $start->diff($end)->format('%d Jour(s)');

    }

}
