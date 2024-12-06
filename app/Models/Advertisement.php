<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Advertisement extends Model
{
    use HasFactory;
    protected $table = 'ads';

    protected $fillable = ['name', 'price', 'photo', 'category_id', 'city_id'];

    /**
     * Категория объявления
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Город объявления
     *
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Пользователь, создавший объявление
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Сообщения по объявлению
     *
     * @return HasMany
     */
    public function messages(): BelongsToMany
    {
        return $this->belongsToMany(Message::class, 'adv_message', 'adv_id', 'message_id');
    }

    /**
     * Формирование полей для формы создания/редактирования
     *
     * @return array
     */
    public function formFields(): array
    {
        $categories = Category::all();
        $cities = City::all();

        $array = [
            'name' => [
                'type' => 'text',
                'required' => true,
                'label' => 'Название объявления',
                'placeholder' => 'Ваше название...',
                'minlength' => 3,
                'maxlength' => 50,
                'value' => $this->name
            ],
            'photo' => [
                'type' => 'text',
                'required' => true,
                'label' => 'Ссылка на фото',
                'placeholder' => 'Вставьте ссылку на фото...',
                'value' => $this->photo
            ],
            'price' => [
                'type' => 'number',
                'required' => true,
                'label' => 'Цена (руб)',
                'placeholder' => 'Введите цену...',
                'value' => $this->price
            ],
        ];

        if ($categories->count() > 0) {
            $array['category_id'] = [
                'type' => 'select',
                'required' => true,
                'label' => 'Категория',
                'emptyValue' => 'Выберите категорию',
                'options' => [],
            ];

            foreach ($categories as $category) {
                $array['category_id']['options'][] = [
                    'value' => $category->id,
                    'text' => $category->name,
                    'selected' => $this->category ? ($this->category->id  == $category->id) : false
                ];
            }
        }

        if ($cities->count() > 0) {
            $array['city_id'] = [
                'type' => 'select',
                'required' => true,
                'label' => 'Город',
                'emptyValue' => 'Выберите город',
                'options' => [],
            ];

            foreach ($cities as $city) {
                $array['city_id']['options'][] = [
                    'value' => $city->id,
                    'text' => $city->name,
                    'selected' => $this->city ? ($this->city->id  == $city->id) : false
                ];
            }
        }

        return $array;
    }
}
