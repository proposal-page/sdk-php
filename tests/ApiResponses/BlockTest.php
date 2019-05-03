<?php

namespace ProposalPage\Sdk\Tests;

class BlockTest extends TestCase
{
    /** @test */
    public function it_can_create_and_return_a_block()
    {
        $response = $this->authenticatedTestClient->createBlock($this->testProjectId, [
            'description' => 'New block'
        ]);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Block'));

        return $response->json['_id'];
    }

    /** @test */
    public function it_can_list_user_project_blocks()
    {
        $response = $this->authenticatedTestClient->listBlocks($this->testProjectId);

        $blocks = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());

        foreach ($blocks as $block) {
            $this->assertJsonDocumentMatchesSchema($block, $this->getSchema('Block'));
        }
    }

    /**
     * @test
     * @param $testBlockId
     * @depends it_can_create_and_return_a_block
     */
    public function it_can_retrieve_a_specific_user_project_block($testBlockId)
    {
        $response = $this->authenticatedTestClient->listBlock($this->testProjectId, $testBlockId);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Block'));
    }

    /**
     * @test
     * @param $testBlockId
     * @depends it_can_create_and_return_a_block
     */
    public function it_can_update_a_specific_user_project_block($testBlockId)
    {
        $response = $this->authenticatedTestClient->updateBlock($this->testProjectId, $testBlockId, [
            'description' => 'Updated description'
        ]);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Block'));
        $this->assertEquals('Updated description', $response->json['description']);
    }

    /**
     * @test
     * @param $testBlockId
     * @depends it_can_create_and_return_a_block
     */
    public function it_can_move_a_specific_user_project_block_forward($testBlockId)
    {
        $response = $this->authenticatedTestClient->moveBlockForward($this->testProjectId, $testBlockId);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Block'));
    }

    /**
     * @test
     * @param $testBlockId
     * @depends it_can_create_and_return_a_block
     */
    public function it_can_move_a_specific_user_project_block_backward($testBlockId)
    {
        $response = $this->authenticatedTestClient->moveBlockBackward($this->testProjectId, $testBlockId);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Block'));
    }

    /**
     * @test
     * @param $testBlockId
     * @depends it_can_create_and_return_a_block
     */
    public function it_can_clone_a_specific_user_project_block_without_a_specific_position($testBlockId)
    {
        $response = $this->authenticatedTestClient->cloneBlock($this->testProjectId, $testBlockId);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Block'));
    }

    /**
     * @test
     * @param $testBlockId
     * @depends it_can_create_and_return_a_block
     */
    public function it_can_clone_a_specific_user_project_block_in_a_specific_position($testBlockId)
    {
        $response = $this->authenticatedTestClient->cloneBlock($this->testProjectId, $testBlockId, 0);

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Block'));
    }

    /**
     * @test
     * @param $testBlockId
     * @depends it_can_create_and_return_a_block
     */
    public function it_can_delete_a_specific_user_project_block($testBlockId)
    {
        $response = $this->authenticatedTestClient->deleteBlock($this->testProjectId, $testBlockId);

        $this->assertEquals(204, $response->getStatusCode());
    }
}
