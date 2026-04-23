<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Services;

use Agenciafmd\Partners\Models\Partner;
use Illuminate\Database\Eloquent\Builder;

final class PartnerService
{
    public static function make(): static
    {
        return app(self::class);
    }

    private function queryBuilder(): Builder
    {
        return Partner::query();
    }
}
