<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Services;

final class PartnerService
{
    public static function make(): static
    {
        return resolve(self::class);
    }
}
