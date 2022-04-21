<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'IDNP', 'status', 'roomNumber'
        ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'IDNP', 'IDNP');
    }

    public function getDisplayStatusAttribute()
    {
        switch($this->status)
        {
            case 0:
                return 'In asteptare';
            case 1:
                return 'Acceptat!';
            case 2:
                return 'Cerere respinsa!';
            default:
                return 'n/a';
        }
    }
//
//    public function getStudentsAttendingAttribute()
//    {
//        $number = $this->where('roomNumber', $this->roomNumber)->where('status', 0)->first();
//        dd($number);
////        return $this->records('roomNumber', $roomNumber)->count();
//    }
}
