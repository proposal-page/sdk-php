<?php

namespace ProposalPage\Sdk\Tests;

class RowTest extends TestCase
{
    /** @test */
    public function it_can_create_and_return_a_row()
    {
        $response = $this->authenticatedTestClient->createRow($this->testProjectId, $this->testBlockId, [
            'description' => 'New row'
        ]);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Row'));

        return $response->json['_id'];
    }

    /** @test */
    public function it_can_list_user_projects_block_rows()
    {
        $response = $this->authenticatedTestClient->listRows($this->testProjectId, $this->testBlockId);

        $rows = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());

        foreach ($rows as $row) {
            $this->assertJsonDocumentMatchesSchema($row, $this->getSchema('Row'));
        }
    }

    /**
     * @test
     * @param $testRowId
     * @depends it_can_create_and_return_a_row
     */
    public function it_can_retrieve_a_specific_user_project_block_row($testRowId)
    {
        $response = $this->authenticatedTestClient->listRow($this->testProjectId, $this->testBlockId, $testRowId);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Row'));
    }

    /**
     * @test
     * @param $testRowId
     * @depends it_can_create_and_return_a_row
     */
    public function it_can_update_a_specific_user_project_block_row($testRowId)
    {
        $response = $this->authenticatedTestClient->updateRow($this->testProjectId, $this->testBlockId, $testRowId, [
            'description' => 'Updated description'
        ]);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Row'));
        $this->assertEquals('Updated description', $response->json['description']);
    }

    /**
     * @test
     * @param $testRowId
     * @depends it_can_create_and_return_a_row
     */
    public function it_can_clone_a_specific_user_project_block_row_without_a_specific_position($testRowId)
    {
        $response = $this->authenticatedTestClient->cloneRow($this->testProjectId, $this->testBlockId, $testRowId);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Row'));
    }

    /**
     * @test
     * @param $testRowId
     * @depends it_can_create_and_return_a_row
     */
    public function it_can_clone_a_specific_user_project_block_row_in_a_specific_position($testRowId)
    {
        $response = $this->authenticatedTestClient->cloneRow($this->testProjectId, $this->testBlockId, $testRowId, 0);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Row'));
    }

    /**
     * @test
     * @param $testRowId
     * @depends it_can_create_and_return_a_row
     */
    public function it_can_delete_a_specific_user_project_block_row($testRowId)
    {
        $response = $this->authenticatedTestClient->deleteRow($this->testProjectId, $this->testBlockId, $testRowId);

        $this->assertEquals(204, $response->getStatusCode());
    }
}
