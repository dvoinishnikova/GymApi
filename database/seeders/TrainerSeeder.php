<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trainer;

class TrainerSeeder extends Seeder
{
    public function run(): void
    {
        Trainer::insert([
            [
                'name' => 'Омелян',
                'type' => 'Набір м’язової маси',
                'experience_years' => 8,
                'clients_count' => 40,
                'rating' => 5.0,
                'description' => 'Омелян спеціалізується на наборі м’язової маси. Використовує сучасні методики тренувань та харчування для максимального результату.

Відгуки:
- Іван: Дуже крутий тренер 💪
- Олег: Результат вже через місяць
- Марія: Складно, але ефективно 😅',
                'phone' => '+380501234567',
                'telegram' => '@omelyan_fit',
                'image' => '/images/trainer1.gif',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Карпо',
                'type' => 'Кросфіт',
                'experience_years' => 5,
                'clients_count' => 25,
                'rating' => 4.7,
                'description' => 'Карпо — експерт у кросфіті. Проводить інтенсивні тренування, що поєднують силові та кардіо вправи для всебічного розвитку.

Відгуки:
- Андрій: Дуже жорсткі тренування 🔥
- Петро: Втомлююсь, але кайфую',
                'phone' => '+380671234567',
                'telegram' => '@karpo_crossfit',
                'image' => '/images/trainer2.gif',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Сніжана',
                'type' => 'Пілатес',
                'experience_years' => 6,
                'clients_count' => 30,
                'rating' => 4.9,
                'description' => 'Сніжана спеціалізується на пілатесі та розвитку гнучкості. Тренування допомагають зміцнити м’язи та покращити поставу.

Відгуки:
- Оксана: Дуже спокійні та корисні заняття
- Ірина: Спина перестала боліти 🙏',
                'phone' => '+380631234567',
                'telegram' => '@snizhana_pilates',
                'image' => '/images/trainer3.gif',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Пилип',
                'type' => 'Пілатес',
                'experience_years' => 4,
                'clients_count' => 18,
                'rating' => 4.5,
                'description' => 'Пилип проводить пілатес-тренування для початківців та просунутих. Його заняття поєднують вправи на баланс та силу.

Відгуки:
- Наталя: Добре пояснює
- Юлія: Дуже приємний тренер 😊',
                'phone' => '+380681234567',
                'telegram' => '@pylip_pilates',
                'image' => '/images/trainer4.gif',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Микола',
                'type' => 'Пілатес',
                'experience_years' => 7,
                'clients_count' => 35,
                'rating' => 4.8,
                'description' => 'Микола допомагає покращити фізичну форму та гнучкість. Його заняття включають персональні та групові тренування.

Відгуки:
- Віктор: Результат супер
- Денис: Хороші тренування',
                'phone' => '+380691234567',
                'telegram' => '@mykola_fit',
                'image' => '/images/trainer5.gif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}