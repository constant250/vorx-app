<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Services\StudentVisaDetailService;
use App\Models\Enums\StudyRightsEnum;
use App\Models\Enums\AppliedForAuResidencyEnum;

class StudentVisaDetail extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'passport_issued_date' => 'date',
        'passport_expiry_date' => 'date',
        'visa_expiry_date' => 'date',
        'study_rights' => StudyRightsEnum::class,
        'applied_for_au_residency' => AppliedForAuResidencyEnum::class,
    ];

    public function Service(): StudentVisaDetailService
    {
        return new StudentVisaDetailService($this);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function visa()
    {
        return $this->belongsTo(VisaType::class, 'visa_type_id', 'id');
    }
}
