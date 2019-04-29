<?php

namespace ProposalPage\Sdk\Tests;

use ProposalPage\Sdk\Client;

class WrapperTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_can_return_the_default_api_url_if_no_url_is_passed_in_constructor()
    {
        $client = new Client();

        $this->assertEquals('https://api.proposalpage.com', $client->getApiUrl());
    }

    /** @test */
    public function it_can_return_the_api_url_passed_in_constructor()
    {
        $client = new Client('http://example.com');

        $this->assertEquals('http://example.com', $client->getApiUrl());
    }

    /** @test */
    public function it_can_return_the_api_url_that_has_been_set_via_setter()
    {
        $client = new Client();

        $client->setApiUrl('http://example.com');

        $this->assertEquals('http://example.com', $client->getApiUrl());
    }

    /** @test */
    public function it_should_not_have_a_default_token_set()
    {
        $client = new Client();

        $this->assertNull($client->getToken());
    }

    /** @test */
    public function it_can_return_the_token_that_has_been_set_via_constructor()
    {
        $client = new Client();

        $client->setToken('token');

        $this->assertEquals('token', $client->getToken());
    }

    /** @test */
    public function it_sets_token_when_authenticate_is_called()
    {
        $client = new Client();

        $client->authenticate('gian_bine@hotmail.com', 'gian6280');

        $this->assertNotNull($client->getToken());
    }

    /** @test */
    public function it_does_not_sets_token_when_authenticate_is_called_with_set_token_flag_set_to_false()
    {
        $client = new Client();

        $client->authenticate('gian_bine@hotmail.com', 'gian6280', false);

        $this->assertNull($client->getToken());
    }
}
