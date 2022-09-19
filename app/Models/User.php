<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'sys_users';
    protected $primaryKey = 'user_id';
    const CREATED_AT = 'user_created_at';
    const UPDATED_AT = 'user_updated_at';
    const DELETED_AT = 'user_deleted_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user__emp_id',
        'user__pro_id',
        'user_login',
        'password',
        'remember_token',
        'user_status'
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

    /**
     * @var array<int, string>
     */
    protected $attributes = [
        'user_status' => ST_NEW,
        'remember_token' => null
    ];

    /**
     * Relation one to one reverse
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class,'user__emp_id','emp_id');
    }

    /**
     * Relation one to one reverse
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'user__pro_id','pro_id');
    }
}
