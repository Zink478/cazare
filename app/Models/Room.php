<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    use HasFactory;
    protected $fillable = [
        'roomNumber', 'roomType', 'roomLocation'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function records()
    {
        return $this->hasMany(Application::class, 'roomNumber', 'roomNumber');
    }

    public function getRecordsCountAttribute()
    {
        return $this->records()->count();
    }

    public function getDisplayNameAttribute()
    {
        switch ($this->roomType) {
            case 1:
                return 'minim necesar';
            case 2:
                return 'standart';
            case 3:
                return 'superior';
            default:
                return 'n/a';
        }
    }

}
