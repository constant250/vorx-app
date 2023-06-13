<?php

namespace App\Models\Enums;

/**
 * @method static ACTIVE()
 * @method static INACTIVE()
 * @method static DEMO()
 *
 */
class OrganisationStatusEnum extends Enumerate
{
    const ACTIVE = 1;
    const INACTIVE = 0;
    const DEMO = 2;
}
