<?php

namespace App\Models\Services;

use App\Models\StudentAvetmissDetail;
use Illuminate\Support\Facades\Auth;

class StudentAvetmissDetailService extends ModelService
{
    /**
     * @var StudentAvetmissDetail
     */
    private $avetmiss;

    public function __construct(StudentAvetmissDetail $avetmiss)
    {
        $this->avetmiss = $avetmiss;
        $this->model = $avetmiss;
    }

    public static function create(
        Int $student_id,
        string $usi = null,
        string $highest_school_level_completed_id = null,
        string $indigenous_status_id = null,
        string $language_id = null,
        string $labour_force_status_id = null,
        string $country_id = null,
        string $disability_flag = 'N',
        Array $disability = null,
        string $prior_educational_achievment_flag = 'N',
        Array $prior_educational_achievment = null,
        string $at_school_flag = 'N',
        string $institute = null,
        string $city_of_birth = null,
        string $survey_contact_status = null,
        string $statistical_area_level_1_id = null,
        string $statistical_area_level_2_id = null,
        string $year_completed = null,
        string $aiss_check_date = null,
        Int $english_test_id = null,
        string $english_test_score = null,
        string $english_test_date = null
    )
    {
        $avetmiss = new StudentAvetmissDetail;
        $avetmiss->student_id = $student_id;
        $avetmiss->usi = $usi;
        $avetmiss->highest_school_level_completed_id = $highest_school_level_completed_id;
        $avetmiss->indigenous_status_id = $indigenous_status_id;
        $avetmiss->language_id = $language_id;
        $avetmiss->labour_force_status_id = $labour_force_status_id;
        $avetmiss->country_id = $country_id;
        $avetmiss->disability_flag = $disability_flag;
        $avetmiss->disability = $disability;
        $avetmiss->prior_educational_achievment_flag = $prior_educational_achievment_flag;
        $avetmiss->prior_educational_achievment = $prior_educational_achievment;
        $avetmiss->at_school_flag = $at_school_flag;
        $avetmiss->institute = $institute;
        $avetmiss->city_of_birth = $city_of_birth;
        $avetmiss->survey_contact_status = $survey_contact_status;
        $avetmiss->statistical_area_level_1_id = $statistical_area_level_1_id;
        $avetmiss->statistical_area_level_2_id = $statistical_area_level_2_id;
        $avetmiss->year_completed = $year_completed;
        $avetmiss->aiss_check_date = $aiss_check_date;
        $avetmiss->english_test_id = $english_test_id;
        $avetmiss->english_test_score = $english_test_score;
        $avetmiss->english_test_date = $english_test_date;
        $avetmiss->save();

        return $avetmiss;
    }

    public function update(
        string $usi = null,
        string $highest_school_level_completed_id = null,
        string $indigenous_status_id = null,
        string $language_id = null,
        string $labour_force_status_id = null,
        string $country_id = null,
        string $disability_flag = 'N',
        Array $disability = null,
        string $prior_educational_achievment_flag = 'N',
        Array $prior_educational_achievment = null,
        string $at_school_flag = 'N',
        string $institute = null,
        string $city_of_birth = null,
        string $survey_contact_status = null,
        string $statistical_area_level_1_id = null,
        string $statistical_area_level_2_id = null,
        string $year_completed = null,
        string $aiss_check_date = null,
        Int $english_test_id = null,
        string $english_test_score = null,
        string $english_test_date = null
    )
    {
        $this->avetmiss->usi = $usi;
        $this->avetmiss->highest_school_level_completed_id = $highest_school_level_completed_id;
        $this->avetmiss->indigenous_status_id = $indigenous_status_id;
        $this->avetmiss->language_id = $language_id;
        $this->avetmiss->labour_force_status_id = $labour_force_status_id;
        $this->avetmiss->country_id = $country_id;
        $this->avetmiss->disability_flag = $disability_flag;
        $this->avetmiss->disability = $disability;
        $this->avetmiss->prior_educational_achievment_flag = $prior_educational_achievment_flag;
        $this->avetmiss->prior_educational_achievment = $prior_educational_achievment;
        $this->avetmiss->at_school_flag = $at_school_flag;
        $this->avetmiss->institute = $institute;
        $this->avetmiss->city_of_birth = $city_of_birth;
        $this->avetmiss->survey_contact_status = $survey_contact_status;
        $this->avetmiss->statistical_area_level_1_id = $statistical_area_level_1_id;
        $this->avetmiss->statistical_area_level_2_id = $statistical_area_level_2_id;
        $this->avetmiss->year_completed = $year_completed;
        $this->avetmiss->aiss_check_date = $aiss_check_date;
        $this->avetmiss->english_test_id = $english_test_id;
        $this->avetmiss->english_test_score = $english_test_score;
        $this->avetmiss->english_test_date = $english_test_date;
        $this->avetmiss->save();

        return $this->avetmiss->fresh();
    }

}