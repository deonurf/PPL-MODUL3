<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group notes
     */
    public function testEditNotes(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // ke halaman awal
                ->assertSee('Modul 3')
                ->clickLink('Log in')
                ->assertPathIs('/login')
                ->type('email', 'admin@gmail.com')
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/dashboard')
                ->clickLink('Notes') // masuk ke daftar Notes
                ->assertPathIs('/notes')
                ->clickLink('Edit') //klik link Edit berdasarkan teks "Edit"
                ->assertSee('Edit Note')
                ->type('title', 'Updated Note Title')
                ->type('description', 'This is an updated note description.')
                ->press('UPDATE') // klik tombol Update
                ->assertPathIs('/notes');
        });
    }
}
