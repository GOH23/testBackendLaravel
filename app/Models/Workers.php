<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Workers extends Model
{
    protected $fillable = ['workerListName', 'parent_id'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Workers::class, 'parent_id');
    }
    public function workers(): HasMany{
        return $this->hasMany(WorkerData::class,"worker_id");
    }
    public function children(): HasMany
    {
        return $this->hasMany(Workers::class, 'parent_id');
    }
}
