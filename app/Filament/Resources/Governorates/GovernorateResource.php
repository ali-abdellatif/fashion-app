<?php

namespace App\Filament\Resources\Governorates;

use App\Filament\Resources\Governorates\Pages\CreateGovernorate;
use App\Filament\Resources\Governorates\Pages\EditGovernorate;
use App\Filament\Resources\Governorates\Pages\ListGovernorates;
use App\Filament\Resources\Governorates\Schemas\GovernorateForm;
use App\Filament\Resources\Governorates\Tables\GovernoratesTable;
use App\Models\Governorate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use LaraZeus\SpatieTranslatable\Resources\Concerns\Translatable;

class GovernorateResource extends Resource
{
    use Translatable;

    protected static ?string $model = Governorate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    public static function getNavigationLabel(): string
    {
        return __('Governorates');
    }

    public static function getModelLabel(): string
    {
        return __('Governorate');
    }

    public static function form(Schema $schema): Schema
    {
        return GovernorateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GovernoratesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListGovernorates::route('/'),
            'create' => CreateGovernorate::route('/create'),
            'edit'   => EditGovernorate::route('/{record}/edit'),
        ];
    }
}
