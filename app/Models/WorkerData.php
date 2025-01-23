<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class WorkerData extends Model
{
    protected $fillable = ['name','photo','id'];
    public function worker_list(): BelongsTo
    {
        return $this->belongsTo(Workers::class);
    }
}
