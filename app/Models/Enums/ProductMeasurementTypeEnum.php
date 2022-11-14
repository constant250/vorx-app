<?php

namespace App\Models\Enums;

/**
 * @method static LITERS()
 * @method static PIECES()
 * @method static MILLILITER()
 * @method static KILOGRAM()
 * @method static GRAM()
 *
 */
class ProductMeasurementTypeEnum extends Enumerate
{
    const LITERS = 1;
    const PIECES = 2;
    const MILLILITER = 3;
    const KILOGRAM = 4;
    const GRAM = 5;
}
