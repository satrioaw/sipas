<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip',
        'name',
        'phone_number',
        'email',
        'password',
        'level_id',
        'department_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    // Relation Method
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function mailTransactions()
    {
        return $this->hasMany(MailTransaction::class);
    }

    public function targetMailTransactions()
    {
        return $this->hasMany(MailTransaction::class, 'target_user_id');
    }


    // Custom Method
    public function hasRole($role)
    {
        return $this->level->getRole() == $role;
    }

    public function getUpperUser()
    {
        $level_id = $this->level->getSameLevel()->getUpperLevel()->id;

        // If Anggota, the upper Department still same
        if ($this->level->name == Level::LEVEL_ANGGOTA) {
            $department_id = $this->department->id;
        } else {
            $department_id = $this->department?->upperDepartment?->id;
        }

        return User::where([['level_id', $level_id], ['department_id', $department_id]])->first();
    }
}
