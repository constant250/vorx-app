<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentAvetmissDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'usi' => $this->usi,
            'highest_school_level_completed_id' => $this->highest_school_level_completed_id,
            'indigenous_status_id' => $this->indigenous_status_id,
            'language_id' => $this->language_id,
            'labour_force_status_id' => $this->labour_force_status_id,
            'country_id' => $this->country_id,
            'disability_flag' => $this->disability_flag,
            'disability_flag_label' => $this->disability_flag->getLabel(),
            'disability' => $this->disability,
            'prior_educational_achievment_flag' => $this->prior_educational_achievment_flag,
            'prior_educational_achievment_flag_label' => $this->prior_educational_achievment_flag->getLabel(),
            'prior_educational_achievment' => $this->prior_educational_achievment,
            'at_school_flag' => $this->at_school_flag,
            'at_school_flag_label' => $this->at_school_flag->getLabel(),
            'institute' => $this->institute,
            'city_of_birth' => $this->city_of_birth,
            'survey_contact_status' => $this->survey_contact_status,
            'statistical_area_level_1_id' => $this->statistical_area_level_1_id,
            'statistical_area_level_2_id' => $this->statistical_area_level_2_id,
            'year_completed' => $this->year_completed,
            'aiss_check_date' => $this->aiss_check_date,
            'english_test_id' => $this->english_test_id,
            'english_test_score' => $this->english_test_score,
            'english_test_date' => $this->english_test_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
