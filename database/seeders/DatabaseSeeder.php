<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $totalRecords = 500000;
        $batchSize = 1000; // Number of records to create per batch
        $counter = 0;

        while ($counter < $totalRecords) {
            // Calculate the remaining records to create
            $remainingRecords = $totalRecords - $counter;
            $recordsToCreate = min($batchSize, $remainingRecords);

            \App\Models\User::factory($recordsToCreate)->create();

            $counter += $recordsToCreate;

            // Display a message at certain intervals (e.g., every 1000 records)
            if ($counter % 1000 === 0) {
                $this->command->info("Seeded $counter out of $totalRecords records.");
            }
        }

        // Create a test user
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
