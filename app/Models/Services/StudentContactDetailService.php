<?php

namespace App\Models\Services;

use App\Models\StudentContactDetail;
use Illuminate\Support\Facades\Auth;

class StudentContactDetailService extends ModelService
{
    /**
     * @var StudentContactDetail
     */
    private $contact;

    public function __construct(StudentContactDetail $contact)
    {
        $this->contact = $contact;
        $this->model = $contact;
    }

    public static function create(
        string $student_id,
        string $addr_suburb = null,
        string $addr_flat_unit_detail = null,
        string $addr_building_property_name = null,
        string $addr_street_name = null,
        string $addr_street_num = null,
        string $postcode = null,
        string $state = null,
        string $addr_postal_delivery_box = null,
        string $home_country_res_addr = null,
        string $phone_home = null,
        string $phone_work = null,
        string $phone_mobile = null,
        string $email = null,
        string $email_alt = null,
        string $emer_name = null,
        string $emer_address = null,
        string $emer_phone = null,
        string $emer_relationship = null
    )
    {
        $contact = new StudentContactDetail;
        $contact->student_id = $student_id;
        $contact->addr_suburb = $addr_suburb;
        $contact->addr_flat_unit_detail = $addr_flat_unit_detail;
        $contact->addr_building_property_name = $addr_building_property_name;
        $contact->addr_street_name = $addr_street_name;
        $contact->addr_street_num = $addr_street_num;
        $contact->postcode = $postcode;
        $contact->state = $state;
        $contact->addr_postal_delivery_box = $addr_postal_delivery_box;
        $contact->home_country_res_addr = $home_country_res_addr;
        $contact->phone_home = $phone_home;
        $contact->phone_work = $phone_work;
        $contact->phone_mobile = $phone_mobile;
        $contact->email = $email;
        $contact->email_alt = $email_alt;
        $contact->emer_name = $emer_name;
        $contact->emer_address = $emer_address;
        $contact->emer_phone = $emer_phone;
        $contact->emer_relationship = $emer_relationship;
        $contact->save();

        return $contact;
    }

    public function update(
        string $addr_suburb = null,
        string $addr_flat_unit_detail = null,
        string $addr_building_property_name = null,
        string $addr_street_name = null,
        string $addr_street_num = null,
        string $postcode = null,
        string $state = null,
        string $addr_postal_delivery_box = null,
        string $home_country_res_addr = null,
        string $phone_home = null,
        string $phone_work = null,
        string $phone_mobile = null,
        string $email = null,
        string $email_alt = null,
        string $emer_name = null,
        string $emer_address = null,
        string $emer_phone = null,
        string $emer_relationship = null
    )
    {
        $this->contact->addr_suburb = $addr_suburb;
        $this->contact->addr_flat_unit_detail = $addr_flat_unit_detail;
        $this->contact->addr_building_property_name = $addr_building_property_name;
        $this->contact->addr_street_name = $addr_street_name;
        $this->contact->addr_street_num = $addr_street_num;
        $this->contact->postcode = $postcode;
        $this->contact->state = $state;
        $this->contact->addr_postal_delivery_box = $addr_postal_delivery_box;
        $this->contact->home_country_res_addr = $home_country_res_addr;
        $this->contact->phone_home = $phone_home;
        $this->contact->phone_work = $phone_work;
        $this->contact->phone_mobile = $phone_mobile;
        $this->contact->email = $email;
        $this->contact->email_alt = $email_alt;
        $this->contact->emer_name = $emer_name;
        $this->contact->emer_address = $emer_address;
        $this->contact->emer_phone = $emer_phone;
        $this->contact->emer_relationship = $emer_relationship;
        $this->contact->save();

        return $this->contact->fresh();
    }

}