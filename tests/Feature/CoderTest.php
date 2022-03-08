<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CoderTest extends TestCase
{
    /**
     * A test for route for creating code.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/generate/2/12');

        $this->assertTrue(is_string($response->getOriginalContent()));
        $response->assertStatus(200);
    }
}
