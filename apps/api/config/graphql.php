<?php

use example\Mutation\ExampleMutation;
use example\Query\ExampleQuery;
use example\Type\ExampleRelationType;
use example\Type\ExampleType;

use App\GraphQL\Query\PostQuery;
use App\GraphQL\Type\PostType;
use App\GraphQL\Type\AuthorType;
use App\GraphQL\Type\TagType;

return [

    'prefix' => 'graphql',
    'routes' => '{graphql_schema?}',
    'controllers' => \Rebing\GraphQL\GraphQLController::class . '@query',
    'middleware' => [],
    'route_group_attributes' => [],
    'default_schema' => 'default',
    'schemas' => [
        'default' => [
            'query' => [
                'posts' => PostQuery::class,
            ],
            'middleware' => [],
            'method' => ['get', 'post'],
        ],
    ],
    'types' => [
        'post' => PostType::class,
        'author' => AuthorType::class,
        'tag' => TagType::class,
    ],
    'error_formatter' => ['\Rebing\GraphQL\GraphQL', 'formatError'],
    'errors_handler' => ['\Rebing\GraphQL\GraphQL', 'handleErrors'],
    'params_key'    => 'variables',
    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ],
    'pagination_type' => \Rebing\GraphQL\Support\PaginationType::class,
    'graphiql' => [
        'prefix' => '/graphiql/{graphql_schema?}',
        'controller' => \Rebing\GraphQL\GraphQLController::class.'@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'display' => env('ENABLE_GRAPHIQL', true),
    ],
];
