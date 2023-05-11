<?php

namespace App\Models\Services;

use App\Models\StudentVisaDetail;
use Illuminate\Support\Facades\Auth;

class StudentVisaDetailService extends ModelService
{
    /**
     * @var StudentVisaDetail
     */
    private $visa;

    public function __construct(StudentVisaDetail $visa)
    {
        $this->visa = $visa;
        $this->model = $visa;
    }

    public static function create(
        Int $student_id,
        string $nationality = null,
        string $passport_no = null,
        string $passport_issued_date = null,
        string $passport_expiry_date = null,
        Int $visa_type_id = null,
        string $subclass = null,
        string $visa_expiry_date = null,
        string $study_rights = null,
        string $applied_for_au_residency = null
    )
    {
        $visa = new StudentVisaDetail;
        $visa->student_id = $student_id;
        $visa->nationality = $nationality;
        $visa->passport_no = $passport_no;
        $visa->passport_issued_date = $passport_issued_date;
        $visa->passport_expiry_date = $passport_expiry_date;
        $visa->visa_type_id = $visa_type_id;
        $visa->subclass = $subclass;
        $visa->visa_expiry_date = $visa_expiry_date;
        $visa->study_rights = $study_rights;
        $visa->applied_for_au_residency = $applied_for_au_residency;
        $visa->save();

        return $visa;
    }

    public function update(
        string $nationality = null,
        string $passport_no = null,
        string $passport_issued_date = null,
        string $passport_expiry_date = null,
        Int $visa_type_id = null,
        string $subclass = null,
        string $visa_expiry_date = null,
        string $study_rights = null,
        string $applied_for_au_residency = null
    )
    {
        $this->visa->nationality = $nationality;
        $this->visa->passport_no = $passport_no;
        $this->visa->passport_issued_date = $passport_issued_date;
        $this->visa->passport_expiry_date = $passport_expiry_date;
        $this->visa->visa_type_id = $visa_type_id;
        $this->visa->subclass = $subclass;
        $this->visa->visa_expiry_date = $visa_expiry_date;
        $this->visa->study_rights = $study_rights;
        $this->visa->applied_for_au_residency = $applied_for_au_residency;
        $this->visa->save();

        return $this->visa->fresh();
    }

}