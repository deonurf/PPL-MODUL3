<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testRegister(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(url: '/') //mengunjungi halaman Login dengan route “/login”
                    ->assertSee(text: 'Modul 3')
                    ->clickLink(link: 'Register')
                    ->assertPathIs(path: '/register')
                    ->type(field: 'name', value: 'admin')
                    ->type(field: 'email', value: 'admin@gmail.com')
                    ->type(field: 'password', value: 'password')
                    ->type(field: 'password_confirmation', value: 'password')
                    ->press(button: 'REGISTER')
                    ->assertPathIs(path: '/dashboard');
                    
        });
    }
}
