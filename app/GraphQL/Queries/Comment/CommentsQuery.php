<?php

declare(strict_types=1);

namespace App\GraphQL\Queries\Comment;

use App\Models\Comment;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class CommentsQuery extends Query
{
    protected $attributes = [
        'name' => 'comments'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Comment'));
    }

    public function args(): array
    {
        return [
            'sortBy' => [
                'name' => 'sortBy',
                'type' => GraphQL::type('SortingEnumComment'),
                'description' => 'Sort the products by date or rating',
            ],
        ];
    }


    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $query = Comment::query();

        if (isset($args['sortBy'])) {
            if ($args['sortBy'] === 'date') {
                $query->orderBy('date', 'desc');
            } elseif ($args['sortBy'] === 'rating') {
                $query->orderBy('rating', 'desc');
            }
        }

        return $query->get();
    }

}
