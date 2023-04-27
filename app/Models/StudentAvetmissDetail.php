<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAvetmissDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'aiss_check_date' => 'date',
        'english_test_date' => 'date',
        'disability' => 'array',
        'prior_educational_achievment' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // TODOS - relationship between avt tables
    
}
