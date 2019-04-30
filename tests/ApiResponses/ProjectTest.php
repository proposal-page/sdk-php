<?php

namespace ProposalPage\Sdk\Tests;

class ProjectTest extends TestCase
{
    /** @test */
    public function it_can_create_and_return_a_project()
    {
        $response = $this->authenticatedTestClient->createProject([
            'title' => 'New Project',
            'blocks' => []
        ]);

        $json = json_decode($response->getContent(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Project'));

        return ($response->_id);
    }

    /** @test */
    public function it_can_create_and_return_a_project_from_a_specific_template()
    {
        $templateId = '5cb47ec98497e9001ad9a1b2';
        $response = $this->authenticatedTestClient->createProjectFromTemplate($templateId);

        $json = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Project'));
    }

    /** @test */
    public function it_can_list_user_projects_paginated()
    {
        $response = $this->authenticatedTestClient->listProjects();

        $json = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('PaginatedProjects'));
    }

    /** @test */
    public function it_can_list_user_projects_paginated_in_a_specific_page()
    {
        $response = $this->authenticatedTestClient->listProjects(2);

        $json = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(2, $response->page);
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('PaginatedProjects'));
    }

    /** @test */
    public function it_can_list_user_projects_paginated_with_a_specific_quantity_of_items_per_page()
    {
        $response = $this->authenticatedTestClient->listProjects(2, 3);

        $json = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(2, $response->page);
        $this->assertEquals(3, $response->limit);
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('PaginatedProjects'));
    }

    /** @test */
    public function it_can_list_project_templates_paginated()
    {
        $response = $this->authenticatedTestClient->listTemplates();

        $json = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('PaginatedProjects'));
    }

    /**
     * @test
     * @param $testProjectId
     * @depends it_can_create_and_return_a_project
     */
    public function it_can_retrieve_a_specific_user_project($testProjectId)
    {
        $response = $this->authenticatedTestClient->listProject($testProjectId);

        $json = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Project'));
    }

    /**
     * @test
     * @param $testProjectId
     * @depends it_can_create_and_return_a_project
     */
    public function it_can_update_a_specific_user_project($testProjectId)
    {
        $response = $this->authenticatedTestClient->updateProject($testProjectId, [
            'title' => 'Updated Project Title',
        ]);

        $json = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Project'));
        $this->assertEquals('Updated Project Title', $response->title);
    }

    /**
     * @test
     * @param $testProjectId
     * @depends it_can_create_and_return_a_project
     */
    public function it_can_clone_a_specific_user_project($testProjectId)
    {
        $response = $this->authenticatedTestClient->cloneProject($testProjectId);

        $json = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Project'));
    }

    /**
     * @test
     * @param $testProjectId
     * @depends it_can_create_and_return_a_project
     */
    public function it_can_set_a_password_in_a_specific_user_project($testProjectId)
    {
        $response = $this->authenticatedTestClient->setProjectPassword($testProjectId, 'password');

        $json = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Project'));
    }

    /**
     * @test
     * @param $testProjectId
     * @depends it_can_create_and_return_a_project
     */
    public function it_can_publish_a_specific_user_project($testProjectId)
    {
        $response = $this->authenticatedTestClient->publishProject($testProjectId);

        $json = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Project'));
    }

    /**
     * @test
     * @param $testProjectId
     * @depends it_can_create_and_return_a_project
     */
    public function it_can_secure_a_specific_user_project($testProjectId)
    {
        $response = $this->authenticatedTestClient->secureProject($testProjectId);

        $json = json_decode($response->getContent(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonDocumentMatchesSchema($json, $this->getSchema('Project'));
    }

    /**
     * @test
     * @param $testProjectId
     * @depends it_can_create_and_return_a_project
     */
    public function it_can_generate_cover_for_a_specific_user_project($testProjectId)
    {
        $response = $this->authenticatedTestClient->generateProjectCover($testProjectId);

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     * @param $testProjectId
     * @depends it_can_create_and_return_a_project
     */
    public function it_can_notify_a_specific_user_about_project_viewed($testProjectId)
    {
        $response = $this->authenticatedTestClient->viewProjectAndNotify($testProjectId);

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     * @param $testProjectId
     * @depends it_can_create_and_return_a_project
     */
    public function it_can_delete_a_specific_user_project($testProjectId)
    {
        $response = $this->authenticatedTestClient->deleteProject($testProjectId);

        $this->assertEquals(204, $response->getStatusCode());
    }
}
