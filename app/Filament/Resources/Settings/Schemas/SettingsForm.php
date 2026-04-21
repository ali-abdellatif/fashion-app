<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class SettingsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('General'))
                    ->icon('heroicon-o-cog-6-tooth')
                    ->columns(2)
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label(__('Logo'))
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('phone_primary')
                            ->label(__('Primary Phone'))
                            ->tel()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('phone_secondary')
                            ->label(__('Secondary Phone'))
                            ->tel()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('email')
                            ->label(__('Email'))
                            ->email()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('address.en')
                            ->label(__('Address (English)'))
                            ->rows(2),
                        Forms\Components\Textarea::make('address.ar')
                            ->label(__('Address (Arabic)'))
                            ->rows(2),
                    ]),

                Section::make(__('Social Media'))
                    ->icon('heroicon-o-share')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('facebook')
                            ->label('Facebook')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram')
                            ->label('Instagram')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('twitter')
                            ->label('Twitter / X')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('youtube')
                            ->label('YouTube')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tiktok')
                            ->label('TikTok')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('whatsapp')
                            ->label('WhatsApp')
                            ->tel()
                            ->maxLength(20),
                    ]),
            ]);
    }
}
