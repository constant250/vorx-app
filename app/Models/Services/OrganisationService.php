<?php

namespace App\Models\Services;

use App\Models\Organisation;
use Illuminate\Support\Facades\Auth;
use App\Models\Enums\OrganisationStatusEnum;
use App\Traits\ImageModelServiceTrait;

class OrganisationService extends ModelService
{
    use ImageModelServiceTrait;
    
    /**
     * @var Organisation
     */
    private $organisation;

    public function __construct(Organisation $organisation)
    {
        $this->organisation = $organisation;
        $this->model = $organisation;
    }

    public static function create(
        string $organisation_id = null,
        string $organisation_name = null,
        string $organisation_logo = null,
        string $org_type_identifier = null,
        string $abn = null,
        string $cricos_code = null,
        string $site_url = null,
        string $contact_name = null,
        string $phone_number = null,
        string $fax_number = null,
        string $email = null,
        string $addr_line_1 = null,
        string $addr_line_2 = null,
        string $suburb = null,
        string $student_id_prefix = null,
        string $person_in_charge_name = null,
        string $person_in_charge_position = null,
        string $person_in_charge_signature = null,
        OrganisationStatusEnum $status
    )
    {
        $organisation = new Organisation;
        $organisation->organisation_id = $organisation_id;
        $organisation->organisation_name = $organisation_name;
        $organisation->organisation_logo = $organisation_logo;
        $organisation->org_type_identifier = $org_type_identifier;
        $organisation->abn = $abn;
        $organisation->cricos_code = $cricos_code;
        $organisation->site_url = $site_url;
        $organisation->contact_name = $contact_name;
        $organisation->phone_number = $phone_number;
        $organisation->fax_number = $fax_number;
        $organisation->email = $email;
        $organisation->addr_line_1 = $addr_line_1;
        $organisation->addr_line_2 = $addr_line_2;
        $organisation->suburb = $suburb;
        $organisation->student_id_prefix = $student_id_prefix;
        $organisation->person_in_charge_name = $person_in_charge_name;
        $organisation->person_in_charge_position = $person_in_charge_position;
        $organisation->person_in_charge_signature = $person_in_charge_signature;
        $organisation->status = $status;
        $organisation->user_id = Auth::user()->id;
        $organisation->account_id = Auth::user()->account_id;
        $organisation->save();

        return $organisation;
    }
   

    public function update(
        string $organisation_id = null,
        string $organisation_name = null,
        string $organisation_logo = null,
        string $org_type_identifier = null,
        string $abn = null,
        string $cricos_code = null,
        string $site_url = null,
        string $contact_name = null,
        string $phone_number = null,
        string $fax_number = null,
        string $email = null,
        string $addr_line_1 = null,
        string $addr_line_2 = null,
        string $suburb = null,
        string $student_id_prefix = null,
        string $person_in_charge_name = null,
        string $person_in_charge_position = null,
        string $person_in_charge_signature = null,
        OrganisationStatusEnum $status
    )
    {
        $this->organisation->organisation_id = $organisation_id;
        $this->organisation->organisation_name = $organisation_name;
        $this->organisation->organisation_logo = $organisation_logo;
        $this->organisation->org_type_identifier = $org_type_identifier;
        $this->organisation->abn = $abn;
        $this->organisation->cricos_code = $cricos_code;
        $this->organisation->site_url = $site_url;
        $this->organisation->contact_name = $contact_name;
        $this->organisation->phone_number = $phone_number;
        $this->organisation->fax_number = $fax_number;
        $this->organisation->email = $email;
        $this->organisation->addr_line_1 = $addr_line_1;
        $this->organisation->addr_line_2 = $addr_line_2;
        $this->organisation->suburb = $suburb;
        $this->organisation->student_id_prefix = $student_id_prefix;
        $this->organisation->person_in_charge_name = $person_in_charge_name;
        $this->organisation->person_in_charge_position = $person_in_charge_position;
        $this->organisation->person_in_charge_signature = $person_in_charge_signature;
        $this->organisation->status = $status;
        $this->organisation->save();

        return $this->organisation->fresh();
    }

    public function uploadImages(string $type, object $images)
    {

        foreach ($images as $image) {
            $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time();
            $file = $this->organisation->FileServiceFactory()->uploadFile($image, $filename);
            $this->organisation->Service()->attachImage($image, $file['name']);
            
            if($type == 'logo'){
                $this->organisation->organisation_logo = $file['name'];
            }else{
                $this->organisation->person_in_charge_signature = $file['name'];
            }
            $this->organisation->save();
        }
        
        $this->organisation->fresh()->images;
        return $this->organisation->image;
    }
}
