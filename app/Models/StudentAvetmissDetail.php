<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Services\StudentAvetmissDetailService;
use App\Models\Enums\AtSchoolFlagEnum;
use App\Models\Enums\DisabilityFlagEnum;
use App\Models\Enums\PriorEducationalAchievementFlagEnum;

class StudentAvetmissDetail extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'aiss_check_date' => 'date',
        'english_test_date' => 'date',
        'disability' => 'array',
        'prior_educational_achievment' => 'array',
        'disability_flag' => AtSchoolFlagEnum::class,
        'prior_educational_achievment_flag' => DisabilityFlagEnum::class,
        'at_school_flag' => PriorEducationalAchievementFlagEnum::class,
    ];
    
    public function Service(): StudentAvetmissDetailService
    {
        return new StudentAvetmissDetailService($this);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function highestSchoolLevel()
    {
        return $this->belongsTo(AvtHighestSchlLvlCompleted::class, 'highest_school_level_completed_id', 'value');
    }

    public function indigenousStatus()
    {
        return $this->belongsTo(AvtClientIndigenousStatus::class, 'indigenous_status_id', 'value');
    }

    public function language()
    {
        return $this->belongsTo(AvtLangIdentifier::class, 'language_id', 'value');
    }

    public function labourForceStatus()
    {
        return $this->belongsTo(AvtLabourForceStatus::class, 'labour_force_status_id', 'value');
    }

    public function country()
    {
        return $this->belongsTo(AvtCountryIdentifier::class, 'country_id', 'identifier');
    }

    public function englishTest()
    {
        return $this->belongsTo(EnglishTest::class, 'english_test_id', 'id');
    }


    
}
