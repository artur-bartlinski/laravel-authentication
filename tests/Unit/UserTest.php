<?php

namespace Tests\Unit;

use App\Address;
use App\AddressUser;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    private $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create([
            'email' => 'john_doe@gmail.com',
        ]);

        $this->be($this->user);
    }

    /** @test */
    public function can_return_user_details()
    {
        $response = $this->get('/home');

        $response->assertSee('john_doe@gmail.com');
    }

    /** @test */
    public function can_update_user_details()
    {
        $this->put('/users/' . $this->user->id, [
            'email' => 'alan_smith@gmail.com',
            '_token' => csrf_token()
        ]);

        $user = (User::where('id', $this->user->id)->get())[0]->toArray();

        $this->assertEquals('alan_smith@gmail.com', $user['email']);
    }

    /** @test */
    public function can_update_user_address_details()
    {
        $this->put('/addresses/' . $this->user->address_id, [
            'town' => 'Faversham',
            '_token' => csrf_token()
        ]);

        $address = (Address::where('id', $this->user->address_id)->get())[0]->toArray();

        $this->assertEquals('Faversham', $address['town']);
    }

    /** @test */
    public function can_delete_address_if_not_primary()
    {
        $this->delete('/addresses/' . $this->user->address_id, [
            '_token' => csrf_token()
        ]);

        $this->assertNotEmpty(Address::where('id', $this->user->address_id));
    }

    /** @test */
    public function can_create_address_record()
    {
        $address = factory(Address::class)->make();

        $this->post('/adresses', array_merge(
            $address->toArray(),
            [
                '_token' => csrf_token(),
            ]
        ));

        $this->assertEquals(1, Address::all()->count());
    }
}
