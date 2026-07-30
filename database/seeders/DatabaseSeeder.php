<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Food::insert([
            [
                'name' => '크림 파스타',
                'price' => 11900,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '토마토 파스타',
                'price' => 10900,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '알리오 올리오',
                'price' => 9900,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '까르보나라',
                'price' => 12900,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '로제 파스타',
                'price' => 12500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '마르게리타 피자',
                'price' => 18000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '페퍼로니 피자',
                'price' => 19500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '고르곤졸라 피자',
                'price' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '콰트로 치즈 피자',
                'price' => 22000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '스테이크',
                'price' => 32000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '함박 스테이크',
                'price' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '치킨 스테이크',
                'price' => 17000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '감바스 알 아히요',
                'price' => 16000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '라자냐',
                'price' => 14000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '리조또',
                'price' => 13500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '버섯 크림 리조또',
                'price' => 14500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '프렌치 토스트',
                'price' => 8500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '에그 베네딕트',
                'price' => 12000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '샐러드 파스타',
                'price' => 11500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '클럽 샌드위치',
                'price' => 9500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '바질 페스토 파스타',
                'price' => 13000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
