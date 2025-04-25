<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group notes
     */
    public function testCreateNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(url: '/') //mengunjungi halaman Login dengan route “/login”
                    ->assertSee(text: 'Modul 3')
                    ->clickLink(link: 'Log in')
                    ->assertPathIs(path: '/login')
            ->type(field: 'email', value: 'admin@gmail.com')
            ->type(field: 'password', value: 'password')
            ->press(button: 'LOG IN')
            ->assertPathIs(path: '/dashboard')
            ->clickLink(link: 'Notes')  //mengunjungi halaman membuat notes
            ->assertPathIs(path: '/notes')
                    ->clickLink('Create Note')
                    ->type('title', 'Test Note Title')
                    ->type('description', 'This is a test note description.')
                    ->press('CREATE')
                    ->assertPathIs('/notes');
        });
    }
}
