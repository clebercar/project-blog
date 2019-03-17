<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PostType',
        'description' => 'Representa a entidade post'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Código identificador do post'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'Título do post'
            ],
            'slug' => [
                'type' => Type::string(),
                'description' => 'Parte da URL do post'
            ],
            'body' => [
                'type' => Type::string(),
                'description' => 'Conteúdo do post'
            ],
            'image' => [
                'type' => Type::string(),
                'description' => 'URL da imagem do post'
            ],
            'published' => [
                'type' => Type::boolean(),
                'description' => 'Status do post que descreve se o mesmo está ou não publicado'
            ],
            'author' => [
                'type' => GraphQL::type('author'),
                'description' => 'Nome do autor do post'
            ],
            'tags' => [
                'type' => Type::listOf(GraphQL::type('tag')),
                'description' => 'Tags do post'
            ]
        ];
    }
}