<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'sys_profiles';
    protected $primaryKey = 'pro_id';
    const CREATED_AT = 'pro_created_at';
    const UPDATED_AT = 'pro_updated_at';
    const DELETED_AT = 'pro_deleted_at';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'pro_name',
        'pro_description',
        'pro_status'
    ];

    /**
     * @var array<int, string>
     */
    protected $attributes = [
        'pro_status' => ST_NEW
    ];

    /**
     * Relation One to Many with User
     */
    public function users()
    {
        return $this->hasMany(User::class,'user__pro_id','pro_id');
    }

    /**
     * Relation Many to Many with Modules
     */
    public function modules()
    {
        return $this->belongsToMany(Profile::class,'sys_privileges','pri__pro_id','pri__mod_id')
            ->wherePivot('pri_status',ST_ACTIVE)
            ->withPivot(
                'pri__pro_id',
                'pri__mod_id',
                'pri_status',
                'pri_permission',
                'pri_created_at',
                'pri_updated_at',
                'pri_deleted_at'
            )
            ->orderBy('pri_id');
    }
}
