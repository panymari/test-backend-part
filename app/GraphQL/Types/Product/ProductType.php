<?php

namespace App\GraphQL\Types\Product;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Product',
        'description' => 'Collection of products',
        'model' => Product::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of the product',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the product',
            ],
            'quantity' => [
                'type' => Type::int(),
                'description' => 'Quantity of the product',
            ]
        ];
    }
}
