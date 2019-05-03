<?php

namespace ProposalPage\Sdk\Tests;

class ContentTest extends TestCase
{
    /** @test */
    public function it_can_create_and_return_a_content()
    {
        $response = $this->authenticatedTestClient->createContent(
            $this->testProjectId,
            $this->testBlockId,
            $this->testRowId,
            $this->testColumnId,
            [
                'style' => [
                    'backgroundImage' => '',
                    'backgroundRepeat' => 'no-repeat',
                    'backgroundSize' => 'cover',
                    'backgroundPosition' => 'center center',
                    'opacity' => 1
                ],
                'type' => 'text',
                'data' => [
                    'json' => [
                        'type' => 'doc',
                        'content' => [
                            [
                                'type' => 'paragraph',
                                'content' => [
                                    [
                                        'type' => 'text',
                                        'content' => 'Lorem Ipsum'
                                    ]
                                ]
                            ]
                        ]
                    ],
                    'html' => '<p style="text-align: center">Lorem Ipsum</p>'
                ]
            ]
        );

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Content'));

        return $response->json['_id'];
    }

    /** @test */
    public function it_can_list_user_projects_block_row_column_contents()
    {
        $response = $this->authenticatedTestClient->listContents(
            $this->testProjectId,
            $this->testBlockId,
            $this->testRowId,
            $this->testColumnId
        );

        $contents = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());

        foreach ($contents as $content) {
            $this->assertJsonDocumentMatchesSchema($content, $this->getSchema('Content'));
        }
    }

    /**
     * @test
     * @param $testContentId
     * @depends it_can_create_and_return_a_content
     */
    public function it_can_retrieve_a_specific_user_projects_block_row_column_content($testContentId)
    {
        $response = $this->authenticatedTestClient->listContent(
            $this->testProjectId,
            $this->testBlockId,
            $this->testRowId,
            $this->testColumnId,
            $testContentId
        );

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Content'));
    }

    /**
     * @test
     * @param $testContentId
     * @depends it_can_create_and_return_a_content
     */
    public function it_can_update_a_specific_user_projects_block_row_column_content($testContentId)
    {
        $response = $this->authenticatedTestClient->updateContent(
            $this->testProjectId,
            $this->testBlockId,
            $this->testRowId,
            $this->testColumnId,
            $testContentId,
            [
                'data' => [
                    'json' => [
                        'type' => 'doc',
                        'content' => [
                            [
                                'type' => 'paragraph',
                                'content' => [
                                    [
                                        'type' => 'text',
                                        'content' => 'Lorem Ipsuma'
                                    ]
                                ]
                            ]
                        ]
                    ],
                    'html' => '<p style="text-align: center">Lorem Ipsuma</p>'
                ]
            ]
        );

        $json = json_decode((string) $response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Content'));
        $this->assertEquals('Lorem Ipsuma', $json['data']['json']['content'][0]['content'][0]['content']);
    }

    /**
     * @test
     * @param $testContentId
     * @depends it_can_create_and_return_a_content
     */
    public function it_can_delete_a_specific_user_projects_block_row_column_content($testContentId)
    {
        $response = $this->authenticatedTestClient->deleteContent(
            $this->testProjectId,
            $this->testBlockId,
            $this->testRowId,
            $this->testColumnId,
            $testContentId
        );

        $this->assertEquals(204, $response->getStatusCode());
    }
}
