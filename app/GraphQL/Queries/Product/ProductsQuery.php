<?php

declare(strict_types=1);

namespace App\GraphQL\Queries\Product;

use App\Models\Product;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ProductsQuery extends Query
{
    protected $attributes = [
        'name' => 'products'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Product'));
    }

    public function args(): array
    {
        return [
            'sortBy' => [
                'name' => 'sortBy',
                'type' => GraphQL::type('SortingEnumProduct'),
                'description' => 'Sort the products by quantity in ascending or descending order',
            ],
        ];
    }


    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return isset($args['sortBy'])
            ? Product::query()->orderBy('quantity', $args['sortBy'])->get()
            : Product::all();
    }
}
