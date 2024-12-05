<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Message extends Model
{
    use HasFactory;

    /**
     * Объявление, к которому привязано сообщение
     *
     * @return BelongsTo
     */
    public function adv(): BelongsToMany
    {
        return $this->belongsToMany(Advertisement::class, 'adv_message', 'adv_id', 'message_id');
    }

    /**
     * Пользователь - отправитель
     *
     * @return BelongsTo
     */
    public function userFrom(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_from_id');
    }

    /**
     * Пользователь - получатель
     *
     * @return BelongsTo
     */
    public function userTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_to_id');
    }
}
