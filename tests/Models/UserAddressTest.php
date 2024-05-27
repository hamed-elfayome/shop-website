<?php

namespace Tests\Models;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UserAddressTest extends TestCase
{
    use RefreshDatabase;

    #[Test] public function it_can_create_an_address()
    {
        $address = UserAddress::factory()->create(['user_id' => 1]);

        $this->assertNotNull($address);
    }

    #[Test] public function address_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $address = UserAddress::factory()->create(['user_id' => $user->id]);

        $this->assertEquals($user->id, $address->user_id);
    }

    #[Test] public function user_has_many_addresses()
    {
        $user = User::factory()->create();
        UserAddress::factory(5)->create(['user_id' => $user->id]);

        $this->assertCount(5, $user->userAddress);
    }
}
