<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Entry;

class EntryTest extends TestCase
{
	use RefreshDatabase;

    /**
     * User can view create form of entries when authenticated.
     *
     * @test 
     */
    public function user_can_view_entry_form_when_authenticated()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/entries/create');
        $response->assertViewIs('entries.create');
    }

    /**
     * User cannot view create form of entries when is not authenticated.
     *
     * @test 
     */
    public function user_cannot_view_entry_form_when_is_not_authenticated()
    {
        $response = $this->get('/entries/create');
        $response->assertRedirect('/login');
    }


    /**
     * User can view update form of entries when authenticated.
     *
     * @test 
     */
    public function user_can_view_entry_update_form_when_authenticated()
    {
        $user = factory(User::class)->create();
        $entry = factory(Entry::class)->create(['title' => 'Title', 'content' => 'Content', 'user_id' => $user->id]);
        $response = $this->actingAs($user)->get('/entries/'. $entry->id. '/edit');
        $response->assertViewIs('entries.edit');
    }

    /**
     * User cannot view update form of entries when is not authenticated.
     *
     * @test 
     */
    public function user_cannot_view_entry_update_form_when_is_not_authenticated()
    {
    	$user = factory(User::class)->create();
        $entry = factory(Entry::class)->create(['title' => 'Title', 'content' => 'Content', 'user_id' => $user->id]);
        $response = $this->get('/entries/'.$entry->id.'/edit');
        $response->assertRedirect('/login');
    }


    /**
     * User can  create an entries when authenticated.
     *
     * @test 
     */
    public function user_can_create_entry_when_authenticated()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/entries');
        $response->assertRedirect('/');
    }

    /**
     * User cannot  create an entry when is not authenticated.
     *
     * @test 
     */
    public function user_cannot_create_entry_when_is_not_authenticated()
    {
        $response = $this->post('/entries');
        $response->assertRedirect('/login');
    }

    /**
     * User cannot  update an entry when is not authenticated.
     *
     * @test 
     */
    public function user_cannot_update_entry_when_is_not_authenticated()
    {
    	$user = factory(User::class)->create();
        $entry = factory(Entry::class)->create(['title' => 'Title', 'content' => 'Content', 'user_id' => $user->id]);
        $response = $this->json('POST','/entries/' . $entry->id, ['user_id' => $user->id, 'entry_id' => $entry->id ,'title' => 'title', 'content' => 'content', '_method' => 'PATCH']);
        $response->assertStatus(401);
    }

    /**
     * User can  update an entry when is  authenticated.
     *
     * @test 
     */
    public function user_can_update_entry_when_is_authenticated()
    {
    	$user = factory(User::class)->create();
        $entry = factory(Entry::class)->create(['title' => 'Title', 'content' => 'Content', 'user_id' => $user->id]);
        $response = $this->actingAs($user)->json('POST','/entries/' . $entry->id, ['user_id' => $user->id, 'entry_id' => $entry->id ,'title' => 'title', 'content' => 'content', '_method' => 'PATCH']);
        $response->assertRedirect('/');
    }

    /**
     * User cannot  update an entry when is not owner.
     *
     * @test 
     */
    public function user_cannot_update_entry_when_is_not_owner()
    {
    	$user = factory(User::class)->create();
    	$user2 = factory(User::class)->create();
        $entry = factory(Entry::class)->create(['title' => 'Title', 'content' => 'Content', 'user_id' => $user2->id]);
        $response = $this->actingAs($user)->json('POST','/entries/' . $entry->id, ['user_id' => $user->id, 'entry_id' => $entry->id ,'title' => 'title', 'content' => 'content', '_method' => 'PATCH']);
        $response->assertStatus(403);
    }

    /**
     * User can  update an entry when is  owner.
     *
     * @test 
     */
    public function user_can_update_entry_when_is_owner()
    {
    	$user = factory(User::class)->create();
        $entry = factory(Entry::class)->create(['title' => 'Title', 'content' => 'Content', 'user_id' => $user->id]);
        $response = $this->actingAs($user)->json('POST','/entries/' . $entry->id, ['user_id' => $user->id, 'entry_id' => $entry->id ,'title' => 'title', 'content' => 'content', '_method' => 'PATCH']);
        $response->assertRedirect('/');
    }



}
