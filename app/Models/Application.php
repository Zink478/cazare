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
                return 0;
            case 1:
                return 1;
            case 2:
                return 2;
            default:
                return 'n/a';
        }
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'IDNP', 'IDNP');
    }
//
//    public function getStudentsAttendingAttribute()
//    {
//        $number = $this->where('roomNumber', $this->roomNumber)->where('status', 0)->first();
//        dd($number);
////        return $this->records('roomNumber', $roomNumber)->count();
//    }
}
