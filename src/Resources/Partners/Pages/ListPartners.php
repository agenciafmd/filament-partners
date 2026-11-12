<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Resources\Partners\Pages;

use Agenciafmd\Partners\Resources\Partners\PartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Override;

final class ListPartners extends ListRecords
{
    #[Override]
    protected static string $resource = PartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
