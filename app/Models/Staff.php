<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];


    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function sub_service()
    {
        return $this->belongsTo(SubService::class);
    }

    public function marital_status()
    {
        return $this->belongsTo(Setting::class);
    }

    public function place_of_birth()
    {
        return $this->belongsTo(Setting::class);
    }

    public function currency()
    {
        return $this->belongsTo(Setting::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Setting::class);
    }

    public function city_resident()
    {
        return $this->belongsTo(Setting::class);
    }

    public function country()
    {
        return $this->belongsTo(Setting::class);
    }

    public function fun()
    {
        return $this->belongsTo(Setting::class,'function_id');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getDurationAttribute()
    {
        $start = new \DateTime($this->start_date);
        $end = new \DateTime($this->end_date);

        return date_diff($start, $end)->format('%d');

    }

}
