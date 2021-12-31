<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    public function a_user_cannot_login_with_invalid_credentials()
    {
        $user = factory(User::class)->create([
            'email' => 'user@user.com',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->visit('/login')
                    ->assertSee('Returning Customer')
                    ->type('email', 'user@user.com')
                    ->type('password', 'wrong-password')
                    ->press('Login')
                    ->assertPathIs('/login')
                    ->assertSee('credentials do not match');
        });
    }

    /** @test */
    public function a_user_can_login_with_valid_credentials()
    {
       

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->visit('/login')
                    ->assertSee('Returning Customer')
                    ->type('email', 'user@user.com')
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/');
        });
    }
}
