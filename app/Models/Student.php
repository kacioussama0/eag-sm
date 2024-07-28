<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_request_id');
    }


    public function level() {
        return $this->belongsTo(Level::class,'level_request_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classes::class,'class_request_id');
    }

    public function place_of_birth()
    {
        return $this->belongsTo(Setting::class,'place_of_birth_id');
    }

    public function country_of_birth()
    {
        return $this->belongsTo(Setting::class,'country_of_birth_id');
    }

    public function currency()
    {
        return $this->belongsTo(Setting::class,'currency_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Setting::class,'nationality_id');
    }

    public function city_resident()
    {
        return $this->belongsTo(Setting::class,'city_residence_id');
    }

    public function country()
    {
        return $this->belongsTo(Setting::class,'country_id');
    }

    public function religion()
    {
        return $this->belongsTo(Setting::class,'religion_id');
    }


    public function maternal_language()
    {
        return $this->belongsTo(Setting::class,'mother_language_id');
    }


    public function second_language()
    {
        return $this->belongsTo(Setting::class,'home_language_id');
    }


    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


}
