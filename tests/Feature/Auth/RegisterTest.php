<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{

    use RefreshDatabase;

    /**
     * register test
     *
     * @return void
     */
    public function testUserCanRegister()
    {
        Event::fake();
        $response = $this->post($this->registerPostRoute(), [
            'name' => 'webscope',
            'email' => 'test@webscope.com',
            'password' => 'todotest',
            'password_confirmation' => 'todotest',
        ]);
        $response->assertRedirect($this->successfulRegistrationRoute());
        $this->assertCount(1, $users = User::all());
        $this->assertAuthenticatedAs($user = $users->first());
        $this->assertEquals('webscope', $user->name);
        $this->assertEquals('test@webscope.com', $user->email);
        $this->assertTrue(Hash::check('todotest', $user->password));
        Event::assertDispatched(Registered::class, function ($e) use ($user) {
            return $e->user->id === $user->id;
        });
    }

    protected function registerPostRoute()
    {
        return route('register');
    }

    protected function successfulRegistrationRoute()
    {
        return route('home');
    }
}
