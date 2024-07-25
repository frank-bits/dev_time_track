<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'rate', 'activity_id', 'user_id', 'event_id', 'project_id'];

    public function activity(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Activity::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongTo(Event::class);
    }

    public function event(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Event::class,'rate_id','id');
    }

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongTo(Event::class);
    }


}
