<?php

namespace App\Filament\Resources\Customers\Schemas;

use App\Models\Governorate;
use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make(__('Customer Info'))
                ->icon('heroicon-o-user')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label(__('Name'))
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('username')
                        ->label(__('Username'))
                        ->required()
                        ->unique('customers', 'username', ignoreRecord: true)
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->label(__('Email'))
                        ->email()
                        ->required()
                        ->unique('customers', 'email', ignoreRecord: true)
                        ->maxLength(255),
                    Forms\Components\TextInput::make('phone')
                        ->label(__('Phone'))
                        ->tel()
                        ->required()
                        ->unique('customers', 'phone', ignoreRecord: true)
                        ->maxLength(20),
                    Forms\Components\TextInput::make('password')
                        ->label(__('Password'))
                        ->password()
                        ->revealable()
                        ->required(fn ($record) => $record === null)
                        ->dehydrated(fn ($state) => filled($state))
                        ->maxLength(255)
                        ->columnSpanFull(),
                    Forms\Components\Toggle::make('is_active')
                        ->label(__('Active'))
                        ->default(true)
                        ->inline(false),
                ]),

            Section::make(__('Addresses'))
                ->icon('heroicon-o-map-pin')
                ->schema([
                    Forms\Components\Repeater::make('addresses')
                        ->label('')
                        ->relationship('addresses')
                        ->schema([
                            Forms\Components\TextInput::make('label')
                                ->label(__('Label'))
                                ->placeholder(__('e.g. Home, Work')),
                            Forms\Components\Select::make('governorate_id')
                                ->label(__('Governorate'))
                                ->options(Governorate::where('is_active', true)->get()->pluck('name', 'id'))
                                ->searchable(),
                            Forms\Components\TextInput::make('city')
                                ->label(__('City')),
                            Forms\Components\TextInput::make('district')
                                ->label(__('District')),
                            Forms\Components\TextInput::make('street')
                                ->label(__('Street'))
                                ->required()
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('building')
                                ->label(__('Building')),
                            Forms\Components\TextInput::make('floor')
                                ->label(__('Floor')),
                            Forms\Components\TextInput::make('apartment')
                                ->label(__('Apartment')),
                            Forms\Components\TextInput::make('postal_code')
                                ->label(__('Postal Code')),
                            Forms\Components\TextInput::make('notes')
                                ->label(__('Notes'))
                                ->columnSpanFull(),
                            Forms\Components\Toggle::make('is_default')
                                ->label(__('Default Address'))
                                ->inline(false),
                        ])
                        ->columns(3)
                        ->addActionLabel(__('Add Address'))
                        ->collapsible(),
                ]),
        ]);
    }
}
