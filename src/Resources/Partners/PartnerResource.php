<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Resources\Partners;

use Agenciafmd\Partners\Models\Partner;
use Agenciafmd\Partners\Resources\Partners\Pages\CreatePartner;
use Agenciafmd\Partners\Resources\Partners\Pages\EditPartner;
use Agenciafmd\Partners\Resources\Partners\Pages\ListPartners;
use Agenciafmd\Partners\Resources\Partners\Schemas\PartnerForm;
use Agenciafmd\Partners\Resources\Partners\Tables\PartnersTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;

final class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('Partner');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Partners');
    }

    public static function getNavigationSort(): ?int
    {
        return config('filament-partners.navigation_sort');
    }

    public static function getNavigationGroup(): ?string
    {
        return config('filament-partners.navigation_group');
    }

    public static function form(Schema $schema): Schema
    {
        return PartnerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PartnersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            AuditsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPartners::route('/'),
            'create' => CreatePartner::route('/create'),
            'edit' => EditPartner::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
