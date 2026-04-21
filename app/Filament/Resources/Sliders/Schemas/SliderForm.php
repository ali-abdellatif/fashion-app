<?php

namespace App\Filament\Resources\Sliders\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class SliderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('Slider Content'))
                    ->description(__('The main text and button details for this slider.'))
                    ->icon('heroicon-o-document-text')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label(__('Title'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('subtitle')
                            ->label(__('Subtitle'))
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('button_text')
                            ->label(__('Button Text'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('button_url')
                            ->label(__('Button URL'))
                            ->required()
                            ->maxLength(255)
                            ->default('shop-default.html'),
                    ]),

                Section::make(__('Slider Image'))
                    ->description(__('Recommended size: 1920x800 pixels'))
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label(__('Image'))
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('sliders')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make(__('Settings'))
                    ->icon('heroicon-o-adjustments-horizontal')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('sort_order')
                            ->label(__('Sort Order'))
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('is_active')
                            ->label(__('Is Active'))
                            ->default(true)
                            ->inline(false),
                    ]),
            ]);
    }
}
