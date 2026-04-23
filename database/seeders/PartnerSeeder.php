<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Database\Seeders;

use Agenciafmd\Partners\Models\Partner;
use Illuminate\Database\Seeder;

final class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        Partner::query()
            ->truncate();

        Partner::factory()
            ->count(50)
            ->create();
    }
}
