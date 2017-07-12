<?php

namespace AppBundle\Controller;

use AppBundle\Schema\Types;
use FOS\RestBundle\Controller\Annotations as Rest;
use GraphQL\GraphQL;
use GraphQL\Schema;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class ApiController
 *
 * @Route("/api")
 *
 * @package AppBundle\Controller
 */
class ApiController {

    /**
     * @Rest\Post("", defaults={"_format" = "json"}, options={"expose" = true})
     */
    public function indexAction(Request $request) {
        $schema = new Schema([
            'query' => Types::query()
        ]);

        $query = $request->request->get('query');
        $variables = $request->request->get('variables');

        $input = [
            'query' => $query === "" ? null : $query,
            'variables' => $variables === "" ? null : $variables
        ];

        if($input['query'] === null) {
            $input['query'] = '{hello}';
        }

        $result = GraphQL::execute(
            $schema,
            $input['query'],
            null,
            null,
            (array) $input['variables']
        );

        return $result;
    }
}
