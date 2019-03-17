<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class TagType extends GraphQLType
{
    protected $attributes = [
        'name' => 'TagType',
        'description' => 'Representa uma possível tag de um post'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Código identificador da tag'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'Nome da tag'
            ]
        ];
    }
}