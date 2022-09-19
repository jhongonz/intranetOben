<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Privilege extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'sys_privileges';
    protected $primaryKey = 'pri_id';
    const CREATED_AT = 'pri_created_at';
    const UPDATED_AT = 'pri_updated_at';
    const DELETED_AT = 'pri_deleted_at';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'pri__pro_id',
        'pri__mod_id',
        'pri_permission',
        'pri_status'
    ];

    /**
     * @var array<int, string>
     */
    protected $attributes = [
        'pri_status' => ST_ACTIVE
    ];
}
