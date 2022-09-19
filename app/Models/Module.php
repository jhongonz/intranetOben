<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'sys_modules';
    protected $primaryKey = 'mod_id';
    const CREATED_AT = 'mod_created_at';
    const UPDATED_AT = 'mod_updated_at';
    const DELETED_AT = 'mod_deleted_at';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'mod__mod_id',
        'mod_name',
        'mod_route',
        'mod_icon_menu',
        'mod_position',
        'mod_status'
    ];

    /**
     * @var array<int, string>
     */
    protected $attributes = [
        'mod_status' => ST_ACTIVE,
        'mod__mod_id' => null,
        'mod_position' => 1
    ];

    /**
     * Relation Many to Many with Profiles
     */
    public function profiles()
    {
        return $this->belongsToMany(Module::class,'sys_privileges','pri__mod_id','pri__pro_id')
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
