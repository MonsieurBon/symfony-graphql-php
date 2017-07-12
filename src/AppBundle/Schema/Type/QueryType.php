<?php


namespace AppBundle\Schema\Type;


use AppBundle\Schema\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class QueryType extends ObjectType {
    public function __construct() {
        $config = [
            'name' => 'Query',
            'fields' => [
                'hello' => Types::string()
            ],
            'resolveField' => function($val, $args, $context, ResolveInfo $info) {
                return $this->{$info->fieldName}($val, $args, $context, $info);
            }
        ];
        parent::__construct($config);
    }

    public function hello() {
        return "Your graphql-php endpoint is ready! Use GraphiQL to browse API";
    }
}