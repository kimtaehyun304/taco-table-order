<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Food;
use App\Models\Category;

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

        Category::insert([
            [
                'name' => '파스타',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '피자',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '음료',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $categories = Category::pluck('id', 'name');

        Food::insert([
            // 파스타
            [
                'category_id' => $categories['파스타'],
                'name' => '크림 파스타',
                'price' => 11900,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories['파스타'],
                'name' => '토마토 파스타',
                'price' => 10900,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories['파스타'],
                'name' => '알리오 올리오',
                'price' => 9900,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories['파스타'],
                'name' => '까르보나라',
                'price' => 12900,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories['파스타'],
                'name' => '로제 파스타',
                'price' => 12500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories['파스타'],
                'name' => '라자냐',
                'price' => 14000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories['파스타'],
                'name' => '샐러드 파스타',
                'price' => 11500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories['파스타'],
                'name' => '바질 페스토 파스타',
                'price' => 13000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 피자
            [
                'category_id' => $categories['피자'],
                'name' => '마르게리타 피자',
                'price' => 18000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories['피자'],
                'name' => '페퍼로니 피자',
                'price' => 19500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories['피자'],
                'name' => '고르곤졸라 피자',
                'price' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories['피자'],
                'name' => '콰트로 치즈 피자',
                'price' => 22000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 음료 (기존 음료 메뉴가 없어서 추가)
            [
                'category_id' => $categories['음료'],
                'name' => '콜라',
                'price' => 2000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories['음료'],
                'name' => '사이다',
                'price' => 2000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categories['음료'],
                'name' => '아메리카노',
                'price' => 3500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}
