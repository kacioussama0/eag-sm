<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function unite()
    {
        return $this->belongsTo(Setting::class,'nature_subject_id');

    }

    public function typeRoom()
    {
        return $this->belongsTo(Setting::class,'type_room_id');

    }

    public function language()
    {
        return $this->belongsTo(Setting::class,'langue_id');
    }

}
