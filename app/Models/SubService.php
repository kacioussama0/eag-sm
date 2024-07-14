<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubService extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','name_ar','service_id'];

    public function service() {
        return $this->belongsTo(Service::class);
    }

}
