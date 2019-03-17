<?php

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;
use GraphQL;

use App\Tag;

class TagQuery extends Query
{
    protected $attributes = [
        'name' => 'Tag',
        'description' => 'Lista páginada de tags'
    ];

    public function type()
    {
        return GraphQL::paginate('post');
    }

    public function args()
    {
        return [];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return Tag::paginate;
    }
}