<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label(__('Category'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label(__('Price'))
                    ->money('EGP')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sale_price')
                    ->label(__('Sale Price'))
                    ->money('EGP')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_quantity')
                    ->label(__('Total Stock'))
                    ->getStateUsing(fn ($record) => $record->totalQuantity())
                    ->badge()
                    ->color(fn ($state) => match(true) {
                        $state === 0  => 'danger',
                        $state <= 5   => 'warning',
                        default       => 'success',
                    }),
                Tables\Columns\IconColumn::make('is_best_seller')
                    ->label(__('Best Seller'))
                    ->boolean(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label(__('Active')),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')->label(__('Active')),
                Tables\Filters\TernaryFilter::make('is_best_seller')->label(__('Best Seller')),
                Tables\Filters\SelectFilter::make('category_id')
                    ->label(__('Category'))
                    ->relationship('category', 'name'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
