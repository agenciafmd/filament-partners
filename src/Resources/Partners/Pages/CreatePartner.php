<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Resources\Partners\Pages;

use Agenciafmd\Admix\Resources\Concerns\RedirectBack;
use Agenciafmd\Partners\Resources\Partners\PartnerResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

final class CreatePartner extends CreateRecord
{
    use RedirectBack;

    #[Override]
    protected static string $resource = PartnerResource::class;
}
