<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffDelay extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function getMinutesAttribute()
    {
        $start = new \DateTime($this->start_hour);
        $end = new \DateTime($this->arrived_hour);

        return $start->diff($end)->format('%i');

    }
}
