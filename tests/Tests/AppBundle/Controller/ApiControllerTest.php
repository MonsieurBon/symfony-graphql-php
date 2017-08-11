<?php


namespace Tests\AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase {
    public function testQueryApi() {
        $client = static::createClient();

        $client->request('POST', '/api');

        $response = $client->getResponse();

        $this->assertEquals(
            "{\"data\":{\"hello\":\"Your graphql-php endpoint is ready! Use GraphiQL to browse API\"}}",
            $response->getContent()
        );
    }

    public function testHelloQuery() {
        $client = static::createClient();

        $client->request(
            'POST',
            '/api',
            array("name" => "query", 'variables' => ''),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            "{hello}"
            );
//            array('CONTENT_TYPE' => 'multipart/form-data; boundary=----WebKitFormBoundaryDWkZD4ir1XtfjNVT'),
//            '------WebKitFormBoundaryDWkZD4ir1XtfjNVT
//Content-Disposition: form-data; name="query"
//
//{
//  hello
//}
//------WebKitFormBoundaryDWkZD4ir1XtfjNVT
//Content-Disposition: form-data; name="variables"
//
//
//------WebKitFormBoundaryDWkZD4ir1XtfjNVT--');

        $response = $client->getResponse();

        $this->assertEquals(
            "{\"data\":{\"hello\":\"Your graphql-php endpoint is ready! Use GraphiQL to browse API\"}}",
            $response->getContent()
        );
    }
}