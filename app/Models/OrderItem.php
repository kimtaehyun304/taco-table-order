<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Table('order_item')]
#[Fillable(['order_id', 'food_id', 'quantity'])]
class OrderItem extends Model
{

    use HasFactory;
    protected $primaryKey = 'order_item_id';
    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'order_item_id' => 'integer',
            'order_id' => 'integer',
            'food_id' => 'integer',
        ];
    }
    
    public function order() : BelongsTo {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function food(): BelongsTo {
        return $this->belongsTo(Food::class, 'food_id', 'food_id');
    }
}