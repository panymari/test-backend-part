<?php

namespace App\GraphQL\Types\Product;

use Rebing\GraphQL\Support\EnumType;

class SortingEnumProductType extends EnumType
{
    protected $enumObject = true;

    protected $attributes = [
        'name' => 'SortingEnumProduct',
        'description' => 'Options for sorting',
        'values' => [
            'ASC' => 'asc',
            'DESC' => 'desc',
        ],
    ];
}
