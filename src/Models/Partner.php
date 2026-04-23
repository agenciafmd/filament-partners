<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Models;

use Agenciafmd\Partners\Database\Factories\PartnerFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

#[UseFactory(PartnerFactory::class)]
final class Partner extends Model implements AuditableContract
{
    use Auditable, HasFactory, Prunable, SoftDeletes;

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

    #[Scope]
    protected function isActive(Builder $query): void
    {
        $query->where('is_active', true);
    }

    #[Scope]
    protected function sort(Builder $query): void
    {
        $defaultSort = $this->defaultSort ?? [
            'is_active' => 'desc',
            'name' => 'asc',
        ];

        foreach ($defaultSort as $field => $direction) {
            $query->orderBy($query->qualifyColumn($field), $direction);
        }
    }

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'star' => 'boolean',
        ];
    }
}
