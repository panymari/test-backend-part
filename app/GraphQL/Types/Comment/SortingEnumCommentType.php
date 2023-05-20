<?php

namespace App\GraphQL\Types\Comment;

use Rebing\GraphQL\Support\EnumType;

class SortingEnumCommentType extends EnumType
{
    protected $enumObject = true;

    protected $attributes = [
        'name' => 'SortingEnumComment',
        'description' => 'Options for sorting',
        'values' => [
            'date',
            'rating'
        ],
    ];
}
