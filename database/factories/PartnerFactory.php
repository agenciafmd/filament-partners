<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Database\Factories;

use Agenciafmd\Partners\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

final class PartnerFactory extends Factory
{
    protected $model = Partner::class;

    public function definition(): array
    {
        $name = fake()->sentence(4);
        $slug = str($name)->slug();

        return [
            'is_active' => fake()->boolean(),
            'star' => fake()->boolean(),
            'name' => $name,
            'description' => fake()->text(maxNbChars: 50),
            'url' => fake()->url(),
            'image' => Storage::putFile('fake', fake()->localImage(ratio: '16:9')),
            'slug' => $slug,
        ];
    }
}
