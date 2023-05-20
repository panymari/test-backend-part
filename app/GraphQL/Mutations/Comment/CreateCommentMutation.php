<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations\Comment;

use App\Models\Comment;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateCommentMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createComment',
        'description' => 'Create comment mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type('Comment');
    }

    public function args(): array
    {
        return [
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the user',
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Email of the user',
                'rules' => ['email']
            ],
            'rating' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Rating that user left for the product',
            ],
            'image' => [
                'type' => Type::string(),
                'description' => 'Quantity of the product',
            ],
            'message' => [
                'type' => Type::string(),
                'description' => 'Quantity of the product',
            ],
            'date' => [
                'type' => Type::string(),
                'description' => 'Quantity of the product',
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Comment::create($args);

    }
}
