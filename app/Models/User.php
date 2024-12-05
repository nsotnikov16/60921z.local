<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Объявления пользователя
     *
     * @return HasMany
     */
    public function ads(): HasMany
    {
        return $this->hasMany(Advertisement::class);
    }

    /**
     * Исходящие сообщения пользователя
     *
     * @return HasMany
     */
    public function messagesFrom(): HasMany
    {
        return $this->hasMany(Message::class, 'user_from_id');
    }

    /**
     * Входящие сообщения пользователя
     *
     * @return HasMany
     */
    public function messagesTo(): HasMany
    {
        return $this->hasMany(Message::class, 'user_to_id');
    }
}
