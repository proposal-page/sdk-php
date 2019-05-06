<?php

namespace ProposalPage\Sdk\Tests;

use Helmich\JsonAssert\JsonAssertions;
use ProposalPage\Sdk\Client;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    use JsonAssertions;

    /** @var Client */
    protected $authenticatedTestClient;

    /** @var Client */
    protected $unauthenticatedTestClient;

    protected $testProjectId = '5ca344b1df6272001ae7d7ac';

    protected $testBlockId = '5cb8698632f905001a024614';

    protected $testRowId = '5cbf11c97f6a64001aea65f2';

    protected $testColumnId = '5cc0ac42003a7c001ab5c95a';

    protected function setUp(): void
    {
        parent::setUp();

        $this->authenticatedTestClient = $this->getAuthenticatedTestClient();
        $this->unauthenticatedTestClient = $this->getUnauthenticatedTestClient();
    }

    protected function getUnauthenticatedTestClient()
    {
        return new Client('http://localhost:3000');
    }

    protected function getAuthenticatedTestClient()
    {
        $client = new Client('http://localhost:3000');

        $client->authenticate('gian_bine@hotmail.com', 'gian6280');

        return $client;
    }

    protected function getSchema($schemaName)
    {
        $schemasPath = dirname(__FILE__) . "/ApiResponses/Schemas";

        $schemaFile = file_get_contents("${schemasPath}/{$schemaName}.json");

        $schema = json_decode($schemaFile, true);

        return $schema;
    }
}
