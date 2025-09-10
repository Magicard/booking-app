<?php

use App\Models\User;
use App\Models\Client;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a booking', function () {
    $user = User::factory()->create();
    $client = Client::factory()->create();

    $bookingData = [
        'title' => 'Test Booking',
        'description' => 'Booking description',
        'start_time' => now()->addDays(1)->toIso8601String(),
        'end_time' => now()->addDays(3)->toIso8601String(),
        'user_id' => $user->id,
        'client_id' => $client->id,
    ];

    $response = $this->postJson('/api/bookings', $bookingData);

    $response->assertStatus(201)
        ->assertJsonFragment([
            'title' => 'Test Booking',
            'description' => 'Booking description',
            'user_id' => $user->id,
            'client_id' => $client->id,
        ]);
});

it('fails to create a booking without required fields', function () {
    $response = $this->postJson('/api/bookings', []);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['title', 'start_time', 'end_time']);
});

it('prevents overlapping bookings for the same user', function () {
    $user = User::factory()->create();
    $client = Client::factory()->create();

    // First booking
    $booking= Booking::factory()->create([
        'user_id' => $user->id,
        'client_id' => $client->id,
        'start_time' => now()->addDay()->setTime(10, 0),
        'end_time' => now()->addDay()->setTime(11, 0),
    ]);

    // Attempt overlapping booking
    $overlapData = [
        'title' => 'Overlap Booking',
        'start_time' => now()->addDay()->setTime(10, 30)->toIso8601String(),
        'end_time' => now()->addDay()->setTime(11, 30)->toIso8601String(),
        'user_id' => $user->id,
        'client_id' => $client->id,
    ];


    $response = $this->postJson('/api/bookings', $overlapData);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['start_time']);
});

it('retrieves bookings for a given week', function () {
    $user = User::factory()->create();
    $client = Client::factory()->create();

    // Booking in target week (Mon–Sun around 2025-08-05)
    $inWeek = Booking::factory()->create([
        'user_id' => $user->id,
        'client_id' => $client->id,
        'start_time' => '2025-08-05 10:00:00',
        'end_time' => '2025-08-05 11:00:00',
    ]);

    // Booking outside the week
    $outWeek = Booking::factory()->create([
        'user_id' => $user->id,
        'client_id' => $client->id,
        'start_time' => '2025-11-15 10:00:00',
        'end_time' => '2025-11-15 11:00:00',
    ]);

    $response = $this->getJson('/api/bookings?filter[week]=2025-08-05');

    // Verify only the in-week booking is returned
    $response->assertStatus(200)
        ->assertJsonFragment([
            'id' => $inWeek->id,
        ])
        ->assertJsonMissing([
            'id' => $outWeek->id,
        ]);
});

