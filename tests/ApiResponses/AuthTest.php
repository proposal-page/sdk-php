<?php

namespace ProposalPage\Sdk\Tests;

class AuthTest extends TestCase
{
    /** @test */
    public function it_can_return_authentication_token()
    {
        $response = $this->unauthenticatedTestClient->authenticate('teste@teste.com', 'teste');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotNull($response->token);
    }

    /** @test */
    public function it_can_return_the_authenticated_user_id()
    {
        $response = $this->authenticatedTestClient->authMe();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotNull($response->id);
    }
}
