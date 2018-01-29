<?php

namespace Tests\Unit;

use App\Address;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function can_register_a_user()
    {
        $user = factory(User::class)->make([
            'email' => 'john_doe@gmail.com',
        ]);

        $address = factory(Address::class)->make();

        $this->post('/register', array_merge(
            $user->toArray(),
            [
                '_token' => csrf_token(),
                'password' => $user->password,
                'password_confirmation' => $user->password
            ],
            $address->toArray()
        ));

        $this->assertDatabaseHas('users', [
            'email' => 'john_doe@gmail.com'
        ]);
    }
}
