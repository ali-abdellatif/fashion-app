<?php

namespace App\Filament\Resources\Gallery\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make(__('Gallery Image'))
                ->icon('heroicon-o-photo')
                ->columns(2)
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label(__('Image'))
                        ->image()
                        ->disk('public')
                        ->directory('gallery')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('instagram_url')
                        ->label(__('Instagram URL'))
                        ->url()
                        ->placeholder('https://www.instagram.com/p/...')
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('sort_order')
                        ->label(__('Sort Order'))
                        ->numeric()
                        ->default(0),
                    Forms\Components\Toggle::make('is_active')
                        ->label(__('Active'))
                        ->default(true)
                        ->inline(false),
                ]),
        ]);
    }
}
