<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'rate', 'activity_id', 'user_id', 'event_id', 'project_id'];

    public function activity(): HasOne
    {
        return $this->hasOne(Activity::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongTo(Event::class);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class,'rate_id','id');
    }

    public function project(): BelongsTo
    {
        return $this->belongTo(Event::class);
    }


}
