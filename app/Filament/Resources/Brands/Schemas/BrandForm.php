<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('Brand Details'))
                    ->icon('heroicon-o-building-storefront')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('Brand Name'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('sort_order')
                            ->label(__('Sort Order'))
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->label(__('Is Active'))
                            ->default(true)
                            ->inline(false),
                    ]),
                Section::make(__('Brand Logo'))
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label(__('Logo'))
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('brands')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
