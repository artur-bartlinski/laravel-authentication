<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /** @test */
    public function can_create_a_user()
    {
        $user = factory(User::class)->make()->toArray();

        $this->post('/user/store', $user);

        $this->assertDatabaseHas('users', [
            'email' => 'abartlinski@gmail.com'
        ]);
    }
}
