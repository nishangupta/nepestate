<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountCrudTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_user_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/account/login', [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $this->assertCount(1, User::all());
    }

    /** @test */
    public function property_can_be_edited()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/account/login', [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ]);

        $this->assertCount(1, User::all());
    }
}
