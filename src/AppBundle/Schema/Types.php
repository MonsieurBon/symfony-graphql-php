<?php

namespace AppBundle\Schema;


use AppBundle\Schema\Type\QueryType;
use GraphQL\Type\Definition\StringType;
use GraphQL\Type\Definition\Type;

class Types {
    private static $query;

    /**
     * @return QueryType
     */
    public static function query() {
        return self::$query ?: (self::$query = new QueryType());
    }

    /**
     * @return StringType
     */
    public static function string() {
        return Type::string();
    }

}