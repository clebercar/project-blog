<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class AuthorType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AuthorType',
        'description' => 'Representa o autor de um post'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Código identificador do autor'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'Nome do autor'
            ]
        ];
    }
}