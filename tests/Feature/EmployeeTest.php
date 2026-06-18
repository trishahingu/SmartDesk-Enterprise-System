<?php

use App\Models\User;

test('employees page loads successfully', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)
                     ->get('/employees');

    $response->assertStatus(200);

});