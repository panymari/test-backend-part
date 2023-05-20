<?php

declare(strict_types=1);

namespace App\GraphQL\Types\Comment;

use App\Models\Comment;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CommentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Comment',
        'description' => 'Collection of products',
        'model' => Comment::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of the comment',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the user',
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Email of the user',
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
}
