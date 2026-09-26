<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Database\Seeders;

use Agenciafmd\Partners\Database\Factories\PartnerFactory;
use Agenciafmd\Partners\Models\Partner;
use Illuminate\Database\Seeder;

final class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        Partner::query()
            ->truncate();

        PartnerFactory::new()
            ->count(50)
            ->create();
    }
}
