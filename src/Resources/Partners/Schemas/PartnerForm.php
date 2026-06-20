<?php

declare(strict_types=1);

namespace Agenciafmd\Partners\Resources\Partners\Schemas;

use Agenciafmd\Admix\Resources\Forms\Components\ImageUploadWithDefault;
use Agenciafmd\Admix\Resources\Infolists\Components\DateTimeEntry;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Group::make([
                            Section::make(__('General'))
                                ->schema([
                                    TextInput::make('name')
                                        ->translateLabel()
                                        ->generateSlug()
                                        ->autofocus()
                                        ->minLength(3)
                                        ->maxLength(255)
                                        ->required(),
                                    TextInput::make('slug')
                                        ->translateLabel()
                                        ->unique()
                                        ->required(),
                                    Textarea::make(name: 'description')
                                        ->translateLabel()
                                        ->required()
                                        ->visible(config('filament-partners.description.visible', false))
                                        ->columnSpanFull(),
                                    TextInput::make('url')
                                        ->translateLabel()
                                        ->url()
                                        ->required()
                                        ->visible(config('filament-partners.url.visible', false))
                                        ->columnSpanFull(),
                                    ImageUploadWithDefault::make(name: 'image', directory: 'partner/image')
                                        ->afterLabel('Max. ' . config('filament-partners.image.width', 720) . 'x' . config('filament-partners.image.height', 540))
                                        ->imageEditorAspectRatioOptions(config('filament-partners.image.aspect_ratio_options', ['4:3']))
                                        ->imageEditorViewportWidth(config('filament-partners.image.width', 720))
                                        ->imageEditorViewportHeight(config('filament-partners.image.height', 540))
                                        ->visible(config('filament-partners.image.visible', false)),
                                ])
                                ->collapsible()
                                ->columns()
                                ->columnSpan(2),
                        ])
                            ->columnSpan(2),
                        Group::make([
                            Section::make(__('Information'))
                                ->schema([
                                    Toggle::make('is_active')
                                        ->translateLabel()
                                        ->default(true),
                                    Toggle::make('star')
                                        ->translateLabel()
                                        ->default(false),
                                    DateTimeEntry::make('created_at'),
                                    DateTimeEntry::make('updated_at'),
                                ])
                                ->collapsible()
                                ->columns(),
                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
