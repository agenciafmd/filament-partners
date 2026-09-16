<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Models;

use Agenciafmd\Admix\Traits\WithScopes;
use Agenciafmd\Partners\Database\Factories\PartnerFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Override;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

#[UseFactory(PartnerFactory::class)]
final class Partner extends Model implements AuditableContract
{
    use Auditable;
    use HasFactory;
    use Prunable;
    use SoftDeletes;
    use WithScopes;

    protected array $defaultSort = [
        'is_active' => 'desc',
        'star' => 'desc',
        'name' => 'asc',
    ];

    public function prunable(): Builder
    {
        return self::query()
            ->where('deleted_at', '<=', now()->subDays(30));
    }

    #[Override]
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'star' => 'boolean',
        ];
    }
}
