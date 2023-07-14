<?php

namespace App\Models;

use App\Models\Services\CourseStructureFeeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStructureFee extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
    
    public function Service(): CourseStructureFeeService
    {
        return new CourseStructureFeeService($this);
    }

    public function state()
    {
        return $this->belongsTo(AvtStateIdentifier::class, 'state_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
