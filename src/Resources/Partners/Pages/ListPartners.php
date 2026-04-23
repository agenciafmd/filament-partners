<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Resources\Partners\Pages;

use Agenciafmd\Partners\Resources\Partners\PartnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListPartners extends ListRecords
{
    protected static string $resource = PartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
