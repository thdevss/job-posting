<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
class Job extends Model
{
    use HasFactory;
    protected $keyType = 'uuid';

    public $incrementing = false;

    public $fillable = [
        'job_type',
        'job_degree',
        'job_gender',
        'job_title',
        'company_name',
        'job_amount',
        'company_address',
        'job_province',
        'telephone_number',
        'job_salary',
        'job_description',
        'expired_at',
        'approved_at',
        'user_ipaddr',
        'user_agent'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());

        });
    }
    
    public function type()
    {
        return $this->hasOne(JobType::class, 'id', 'job_type');
    }

    public function degree()
    {
        return $this->hasOne(JobDegree::class, 'id', 'job_degree');
    }
}
