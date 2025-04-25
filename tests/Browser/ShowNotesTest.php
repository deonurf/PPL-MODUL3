<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShowNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group notes
     */
    public function testShowNotes(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee('Modul 3')
            ->clickLink('Log in')
            ->assertPathIs('/login')
            ->type('email', 'admin@gmail.com')
            ->type('password', 'password')
            ->press('LOG IN')
            ->assertPathIs('/dashboard')
            ->assertSee('Dashboard')
            ->clickLink('Notes')
            ->assertPathIs('/notes')
            ->assertSee('Notes');

        $browser->clickLink('Edit')
            ->assertSee('Notes / Edit')
            ->assertInputValue('title', 'Updated Note Title') 
            ->assertInputValue('description', 'This is an updated note description.');
        });
    }
}
