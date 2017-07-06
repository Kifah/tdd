<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\Assert;
use GuzzleHttp\Client;

/**
 * Defines application features from the specific context.
 */
class ApiContext extends Assert implements Context
{


    const BASE_URL = 'http://127.0.0.1/app_dev.php';
    private $client;
    private $responseCode;
    private $responseContent;
    private $contentType;

    /**
     * @var $response \GuzzleHttp\Psr7\Response
     */
    private $response;


    public function __construct()
    {

        $this->client = new Client();


    }


    /**
     * @Then I should get Status Code :arg1
     * @param int $statusCode
     */
    public function iShouldGetStatusCode(int $statusCode)
    {
        $this->assertEquals($statusCode, $this->responseCode);

    }

    /**
     * @Then I should get the Json Content
     * @param PyStringNode $payLoad
     */
    public function iShouldGetTheJsonContent(PyStringNode $payLoad)
    {
        $rawString = $payLoad->getRaw();
        $expectedContent = json_decode($rawString, true);
        $realContent = json_decode($this->responseContent, true);
        $this->assertEquals($expectedContent, $realContent);
        $this->assertEquals('application/json', $this->contentType);
    }

    /**
     * @Given /^I send a GET request to "([^"]*)"$/
     */
    public function iSendAGETRequestTo(string $path)
    {
        return $this->prepareRequest('GET', $path);
    }

    private function prepareRequest(string $method, string $path)
    {

        try {
            $this->response = $this->client->request($method, self::BASE_URL . $path);
            $this->responseCode = $this->response->getStatusCode();
            $this->responseContent = $this->response->getBody()->getContents();
            $this->contentType=$this->response->getHeader('content-type')[0];
        } catch (ClientException $e) {
            $this->responseCode = $e->getResponse()->getStatusCode();
            $this->responseContent = $e->getResponse()->getBody()->getContents();

        }
    }


}
