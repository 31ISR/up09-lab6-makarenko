<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Note;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            // Пока что хардкодим айдишку
            'id' => 1,
            'name' => 'Test User',
            'email' => 'test@example.com',
            // и хардкодим пароль
            'password' => bcrypt('pass123.')
        ]);

        // Создаем 100 заметок для теста
        Note::factory(100)->create();
    }
}
