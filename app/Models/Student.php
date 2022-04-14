<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'IDNP', 'name', 'surname', 'phone', 'group'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function records()
    {
        return $this->hasMany(Record::class, 'IDNP', 'IDNP');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */

    public function getHasRoomAttribute()
    {
        return $this->belongsTo(Record::class, 'IDNP', 'IDNP');
    }
}
