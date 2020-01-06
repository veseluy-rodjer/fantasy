<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification()
    {
		$locale = \App::getLocale();
		$this->notify((new \App\Notifications\MyVerified)->locale($locale));
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
		$locale = \App::getLocale();
        $this->notify((new \App\Notifications\ResetPassword($token))->locale($locale));
    }

    /**
     * Get the titles for the user.
     */
    public function titles()
    {
        return $this->hasMany('App\Title');
    }

    /**
     * Get the opuses for the user.
     */
    public function opuses()
    {
        return $this->hasMany('App\Opus');
    }
}
