<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Table('orders')]
#[Fillable(['table_number', 'status'])]
class Order extends Model
{

    use HasFactory;
    protected $primaryKey = 'order_id';

    protected function casts(): array
    {
        return [
            'order_id' => 'integer',
            'table_number' => 'integer',
            'status' => 'enum',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];
    }

    public function orderItems() : HasMany {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

}