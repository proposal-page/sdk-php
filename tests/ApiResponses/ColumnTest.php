<?php

namespace ProposalPage\Sdk\Tests;

class ColumnTest extends TestCase
{
    /** @test */
    public function it_can_create_and_return_a_column()
    {
        $response = $this->authenticatedTestClient->createColumn(
            $this->testProjectId,
            $this->testBlockId,
            $this->testRowId,
            [
                'contents' => [],
                'size' => 1
            ]
        );

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Column'));

        return $response->json['_id'];
    }

    /** @test */
    public function it_can_list_user_projects_block_row_columns()
    {
        $response = $this->authenticatedTestClient->listColumns($this->testProjectId, $this->testBlockId, $this->testRowId);

        $columns = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());

        foreach ($columns as $column) {
            $this->assertJsonDocumentMatchesSchema($column, $this->getSchema('Column'));
        }
    }

    /**
     * @test
     * @param $testColumnId
     * @depends it_can_create_and_return_a_column
     */
    public function it_can_retrieve_a_specific_user_projects_block_row_column($testColumnId)
    {
        $response = $this->authenticatedTestClient->listColumn($this->testProjectId, $this->testBlockId, $this->testRowId, $testColumnId);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Column'));
    }

    /**
     * @test
     * @param $testColumnId
     * @depends it_can_create_and_return_a_column
     */
    public function it_can_update_a_specific_user_projects_block_row_column($testColumnId)
    {
        $response = $this->authenticatedTestClient->updateColumn(
            $this->testProjectId,
            $this->testBlockId,
            $this->testRowId,
            $testColumnId,
            [
                'size' => 11
            ]
        );

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Column'));
        $this->assertEquals(11, $response->json['size']);
    }

    /**
     * @test
     * @param $testColumnId
     * @depends it_can_create_and_return_a_column
     */
    public function it_can_delete_a_specific_user_projects_block_row_column($testColumnId)
    {
        $response = $this->authenticatedTestClient->deleteColumn($this->testProjectId, $this->testBlockId, $this->testRowId, $testColumnId);

        $this->assertEquals(204, $response->getStatusCode());
    }
}
