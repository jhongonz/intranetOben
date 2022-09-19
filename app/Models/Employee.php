<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'app_employees';
    protected $primaryKey = 'emp_id';
    const CREATED_AT = 'emp_created_at';
    const UPDATED_AT = 'emp_updated_at';
    const DELETED_AT = 'emp_deleted_at';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'emp_number_identification',
        'emp_type_identification',
        'emp_name',
        'emp_lastname',
        'emp_phone',
        'emp_email',
        'emp_address',
        'emp_observations',
        'emp_search',
        'emp_status'
    ];

    /**
     * @var array<int, string>
     */
    protected $attributes = [
        'emp_status' => ST_NEW
    ];

    /**
     * Relation one to one
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user__emp_id','emp_id');
    }

    /**
     * Relation Many to Many with Leguages
     */
    public function lenguages()
    {
        return $this->belongsToMany(Lenguage::class,'app_employee_lenguages','mlen__emp_id','mlen__len_id')->as('lenguages')
            ->wherePivot('mlen_status','>', ST_DELETE)
            ->withPivot(
                'mlen__emp_id',
                'mlen__len_id',
                'mlen_default',
                'mlen_status',
                'mlen_updated_at',
                'mlen_created_at',
                'mlen_deleted_at'
            )
            ->orderBy('mlen_id','DESC');
    }
}
