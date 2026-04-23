<?php

declare(strict_types=1);

namespace Agenciafmd\Partners;

use Agenciafmd\Partners\Resources\Partners\PartnerResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

final class PartnersPlugin implements Plugin
{
    public static function make(): static
    {
        return app(self::class);
    }

    public function getId(): string
    {
        return 'partners';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                PartnerResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
