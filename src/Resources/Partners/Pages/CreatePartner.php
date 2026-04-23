<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Resources\Partners\Pages;

use Agenciafmd\Admix\Resources\Concerns\RedirectBack;
use Agenciafmd\Partners\Resources\Partners\PartnerResource;
use Filament\Resources\Pages\CreateRecord;

final class CreatePartner extends CreateRecord
{
    use RedirectBack;

    protected static string $resource = PartnerResource::class;
}
