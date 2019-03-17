<?php

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;
use GraphQL;

use App\Post;

class PostQuery extends Query
{
    protected $attributes = [
        'name' => 'PostQuery',
        'description' => 'Lista páginada de posts'
    ];

    public function type()
    {
        return GraphQL::paginate('post');
    }

    public function args()
    {
        return [
            'paginate' => [
                'type' => Type::int(),
                'description' => 'Quantidade de registros que devem ser retornados'
            ],
            'page' => [
                'type' => Type::int(),
                'description' => 'Página que deve ser apresentada'
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $paginate = 5;
        $page = 1;

        if (isset($args['paginate']))
            $paginate = $args['paginate'];

        if (isset($args['page']))
            $page = $args['page'];

        return Post::paginate($paginate, ['*'], 'page', $page);
    }
}