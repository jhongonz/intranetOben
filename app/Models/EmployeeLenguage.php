<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeLenguage extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'app_employee_lenguages';
    protected $primaryKey = 'mlen_id';
    const CREATED_AT = 'mlen_created_at';
    const UPDATED_AT = 'mlen_updated_at';
    const DELETED_AT = 'mlen_deleted_at';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'mlen__emp_id',
        'mlen__len_id',
        'mlen_code',
        'mlen_default',
        'mlen_status'
    ];

    /**
     * @var array<int, string>
     */
    protected $attributes = [
        'mlen_status' => ST_ACTIVE,
        'mlen_default' => DB_FALSE
    ];
}
