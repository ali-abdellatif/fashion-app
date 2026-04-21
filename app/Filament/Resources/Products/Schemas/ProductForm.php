<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Brand;
use App\Models\Category;
use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make(__('Product Info'))
                ->icon('heroicon-o-shopping-bag')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label(__('Name'))
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('slug')
                        ->label(__('Slug'))
                        ->helperText(__('Auto-generated from English name. You can override it.'))
                        ->maxLength(255)
                        ->unique('products', 'slug', ignoreRecord: true)
                        ->columnSpanFull(),
                    Forms\Components\RichEditor::make('description')
                        ->label(__('Description'))
                        ->columnSpanFull(),
                    Forms\Components\Select::make('category_id')
                        ->label(__('Category'))
                        ->options(Category::where('is_active', true)->get()->pluck('name', 'id'))
                        ->searchable(),
                    Forms\Components\Select::make('brand_id')
                        ->label(__('Brand'))
                        ->options(Brand::where('is_active', true)->get()->pluck('name', 'id'))
                        ->searchable(),
                    Forms\Components\TextInput::make('price')
                        ->label(__('Price'))
                        ->numeric()
                        ->prefix('EGP')
                        ->required(),
                    Forms\Components\TextInput::make('sale_price')
                        ->label(__('Sale Price'))
                        ->numeric()
                        ->prefix('EGP')
                        ->nullable(),
                    Forms\Components\TextInput::make('sort_order')
                        ->label(__('Sort Order'))
                        ->numeric()
                        ->default(0),
                    Forms\Components\Toggle::make('is_active')
                        ->label(__('Active'))
                        ->default(true)
                        ->inline(false),
                    Forms\Components\Toggle::make('is_best_seller')
                        ->label(__('Best Seller'))
                        ->default(false)
                        ->inline(false),
                ]),

            Section::make(__('Sizes'))
                ->icon('heroicon-o-squares-2x2')
                ->schema([
                    Forms\Components\Repeater::make('sizes')
                        ->label('')
                        ->relationship('sizes')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label(__('Size'))
                                ->required()
                                ->placeholder('S, M, L, XL ...'),
                            Forms\Components\TextInput::make('quantity')
                                ->label(__('Quantity'))
                                ->numeric()
                                ->default(0)
                                ->minValue(0),
                            Forms\Components\TextInput::make('sort_order')
                                ->label(__('Order'))
                                ->numeric()
                                ->default(0),
                        ])
                        ->columns(3)
                        ->addActionLabel(__('Add Size'))
                        ->reorderable('sort_order')
                        ->collapsible(),
                ]),

            Section::make(__('Images & Colors'))
                ->icon('heroicon-o-photo')
                ->schema([
                    Forms\Components\Repeater::make('images')
                        ->label('')
                        ->relationship('images')
                        ->schema([
                            Forms\Components\FileUpload::make('image')
                                ->label(__('Image'))
                                ->image()
                                ->disk('public')
                                ->directory('products')
                                ->required()
                                ->columnSpan(2),
                            Forms\Components\TextInput::make('color_name')
                                ->label(__('Color Name'))
                                ->placeholder('e.g. Orange / برتقالي')
                                ->helperText(__('Leave empty if this is not a color variant')),
                            Forms\Components\ColorPicker::make('color_hex')
                                ->label(__('Color'))
                                ->helperText(__('Pick the color to display in the swatch')),
                            Forms\Components\TextInput::make('quantity')
                                ->label(__('Quantity'))
                                ->numeric()
                                ->default(0)
                                ->minValue(0),
                            Forms\Components\Toggle::make('is_primary')
                                ->label(__('Main Image'))
                                ->inline(false),
                            Forms\Components\Toggle::make('is_hover')
                                ->label(__('Hover Image'))
                                ->inline(false),
                            Forms\Components\TextInput::make('sort_order')
                                ->label(__('Order'))
                                ->numeric()
                                ->default(0),
                        ])
                        ->columns(3)
                        ->addActionLabel(__('Add Image'))
                        ->reorderable('sort_order')
                        ->collapsible(),
                ]),
        ]);
    }
}
