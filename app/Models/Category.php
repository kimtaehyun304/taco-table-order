<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Table('category')]
#[Fillable(['name'])]
class Category extends Model
{

    use HasFactory;
    protected $primaryKey = 'category_id';

    protected function casts(): array
    {
        return [
            'category_id' => 'integer',
            'name' => 'string',
        ];
    }
}
