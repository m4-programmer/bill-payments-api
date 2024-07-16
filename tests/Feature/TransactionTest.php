<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    public function test_we_can_create_a_transaction()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/transactions', [
            'user_id' => $user->id,
            'description' => 'Payment for services',
            'amount' => 100.50,
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => ['id', 'user_id', 'description', 'amount', 'created_at', 'updated_at'],
            ]);
    }

    public function test_we_can_list_all_transactions()
    {
        Transaction::factory()->count(5)->create();

        $response = $this->getJson('/api/transactions');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'user_id', 'description', 'amount', 'created_at', 'updated_at'],
                ],
            ]);
    }

    public function test_we_can_show_a_transaction()
    {
        $transaction = Transaction::factory()->create();

        $response = $this->getJson("/api/transactions/{$transaction->id}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => ['id', 'user_id', 'description', 'amount', 'created_at', 'updated_at'],
            ]);
    }

    public function test_we_can_update_a_transaction()
    {
        $transaction = Transaction::factory()->create();

        $response = $this->putJson("/api/transactions/{$transaction->id}", [
            'description' => 'Updated payment description',
            'amount' => 150.75,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $transaction->id,
                    'description' => 'Updated payment description',
                    'amount' => 150.75,
                ],
            ]);
    }

    public function test_we_can_delete_a_transaction()
    {
        $transaction = Transaction::factory()->create();

        $response = $this->deleteJson("/api/transactions/{$transaction->id}");

        $response->assertStatus(204);
    }
}
