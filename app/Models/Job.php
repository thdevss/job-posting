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
