<?php

namespace App\Filament\Resources\Gallery;

use App\Filament\Resources\Gallery\Pages\CreateGalleryImage;
use App\Filament\Resources\Gallery\Pages\EditGalleryImage;
use App\Filament\Resources\Gallery\Pages\ListGalleryImages;
use App\Filament\Resources\Gallery\Schemas\GalleryForm;
use App\Filament\Resources\Gallery\Tables\GalleryTable;
use App\Models\GalleryImage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = GalleryImage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    public static function getNavigationLabel(): string
    {
        return __('Gallery');
    }

    public static function getModelLabel(): string
    {
        return __('Gallery Image');
    }

    public static function form(Schema $schema): Schema
    {
        return GalleryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GalleryTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListGalleryImages::route('/'),
            'create' => CreateGalleryImage::route('/create'),
            'edit'   => EditGalleryImage::route('/{record}/edit'),
        ];
    }
}
