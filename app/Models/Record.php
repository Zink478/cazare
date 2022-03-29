<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = [
        'IDNP', 'roomNumber',
    ];

    public function students()
    {
        return $this->belongsTo(Student::class, 'IDNP');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'roomNumber');
    }

}
