<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Tests\Feature\Seeders;

use Agenciafmd\Partners\Database\Seeders\PartnerSeeder;
use Agenciafmd\Partners\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

use function Pest\Laravel\seed;

uses(TestCase::class, RefreshDatabase::class);

it('seeds the partners from the factory', function (): void {
    Storage::fake();

    seed(PartnerSeeder::class);

    expect(Partner::query()->count())->toBe(50);
});
