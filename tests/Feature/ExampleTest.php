<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class ExampleTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response() {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_page_returns_correct_component() {
        $response = $this->get('/');
        $response->assertInertia(
            fn (AssertableInertia $page) => $page
            ->component('HomePage')
        );
    }
}
