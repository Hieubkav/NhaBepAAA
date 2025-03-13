<?php

namespace App\Filament\Resources;

use App\Models\MenuItem;
use App\Models\Cat;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\MenuItemResource\Pages;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    
    protected static ?string $navigationLabel = 'Menu động';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('parent_id')
                    ->label('Parent Menu')
                    ->relationship('parent', 'label')
                    ->searchable()
                    ->preload(),

                Forms\Components\TextInput::make('label')
                    ->required()
                    ->maxLength(255)
                    ->label('Tên hiển thị'),

                Forms\Components\Select::make('type')
                    ->options([
                        'link' => 'Custom Link',
                        'category' => 'Danh mục',
                        'page' => 'Trang',
                    ])
                    ->required()
                    ->live()
                    ->default('link')
                    ->label('Loại menu'),

                Forms\Components\TextInput::make('link')
                    ->required()
                    ->maxLength(255)
                    ->label('URL')
                    ->visible(fn (Forms\Get $get): bool => $get('type') === 'link'),

                Forms\Components\Select::make('target_id')
                    ->label('Danh mục')
                    ->options(Cat::query()->pluck('name', 'id'))
                    ->afterStateUpdated(fn($state, Forms\Set $set) => $set('target_type', $state ? Cat::class : null))
                    ->required()
                    ->searchable()
                    ->preload()
                    ->visible(fn (Forms\Get $get): bool => $get('type') === 'category'),

                Forms\Components\Select::make('target_id')
                    ->label('Trang')
                    ->options(Page::query()->pluck('title', 'id'))
                    ->afterStateUpdated(fn($state, Forms\Set $set) => $set('target_type', $state ? Page::class : null))
                    ->required()
                    ->searchable()
                    ->preload()
                    ->visible(fn (Forms\Get $get): bool => $get('type') === 'page'),

                Forms\Components\Hidden::make('target_type'),

                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->label('Thứ tự'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('label')
                    ->searchable()
                    ->sortable()
                    ->label('Tên'),
                Tables\Columns\TextColumn::make('url')
                    ->getStateUsing(fn (MenuItem $record): string => $record->getUrl())
                    ->label('URL'),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->label('Loại'),
                Tables\Columns\TextColumn::make('parent.label')
                    ->searchable()
                    ->label('Menu cha'),
                Tables\Columns\TextColumn::make('order')
                    ->sortable()
                    ->label('Thứ tự')
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}
