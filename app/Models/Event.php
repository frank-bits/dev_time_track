<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'description','date','status','rate_id', 'project_id','start_time','end_time','task_id','user_id'];

    public function rate(): HasOne
    {
        return $this->hasOne(Rate::class, 'id', 'rate_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
}
