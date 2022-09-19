<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lenguage extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'app_lenguages';
    protected $primaryKey = 'len_id';
    const CREATED_AT = 'len_created_at';
    const UPDATED_AT = 'len_updated_at';
    const DELETED_AT = 'len_deleted_at';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'len_code',
        'len_status'
    ];

    /**
     * @var array<int, string>
     */
    protected $attributes = [
        'len_status' => ST_ACTIVE
    ];

    /**
     * Relation Many to Many with Leguages
     */
    public function employees()
    {
        return $this->belongsToMany(Lenguage::class,'app_employee_lenguages','mlen__len_id','mlen__emp_id')->as('lenguages')
            ->wherePivot('mlen_status','>', ST_DELETE)
            ->withPivot(
                'mlen__emp_id',
                'mlen__len_id',
                'mlen_default',
                'mlen_status',
                'mlen_created_at',
                'mlen_updated_at',
                'mlen_deleted_at'
            )
            ->orderBy('len_id','DESC');
    }
}
