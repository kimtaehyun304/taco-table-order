<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'price', 'category_id'])]
class Food extends Model
{

    use HasFactory;
    protected $primaryKey = 'food_id';

    protected function casts(): array
    {
        return [
            'food_id' => 'integer',
            'name' => 'string',
            'price' => 'integer',
            'category_id' => 'integer',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];
    }
}
