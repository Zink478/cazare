<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Exception;
use Twilio\Rest\Client;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 1;
    const ROLE_USER  = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsAdminAttribute()
    {
        return $this->role === static::ROLE_ADMIN;
    }

    public function getIsUserAttribute()
    {
        return $this->role === static::ROLE_USER;
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->phone;
    }
//    public function generateCode()
//    {
//        $code = rand(1000, 9999);
//
//        UserCode::updateOrCreate(
//            [ 'user_id' => auth()->user()->id ],
//            [ 'code' => $code ]
//        );
//
//        $receiverNumber = auth()->user()->phone;
//        $message = "2FA login code is ". $code;
//
//        try {
//
//            $account_sid = getenv("TWILIO_SID");
//            $auth_token = getenv("TWILIO_TOKEN");
//            $twilio_number = getenv("TWILIO_FROM");
//
//            $client = new Client($account_sid, $auth_token);
//            $client->messages->create($receiverNumber, [
//                'from' => $twilio_number,
//                'body' => $message]);
//
//        } catch (Exception $e) {
//            info("Error: ". $e->getMessage());
//        }
//    }
}
