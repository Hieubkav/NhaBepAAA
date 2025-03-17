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
                    ->label('Menu cha')
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
                Tables\Columns\IconColumn::make('level')
                    ->icon(fn (MenuItem $record): string => 
                        $record->parent_id === null ? 'heroicon-m-squares-2x2' : 
                        ($record->children->count() > 0 ? 'heroicon-m-chevron-right' : 'heroicon-m-minus')
                    )
                    ->color(fn (MenuItem $record): string => match(true) {
                        $record->parent_id === null => 'success',
                        $record->children->count() > 0 => 'info',
                        default => 'gray'
                    })
                    ->tooltip(fn (MenuItem $record): string => 'Cấp ' . ($record->getLevel() + 1)),

                Tables\Columns\TextColumn::make('label')
                    ->formatStateUsing(function (MenuItem $record): string {
                        $prefix = str_repeat('   ', $record->getLevel());
                        return $prefix . $record->label;
                    })
                    ->searchable()
                    ->sortable()
                    ->label('Tên menu')
                    ->color(fn (MenuItem $record): string => match(true) {
                        $record->parent_id === null => 'success',
                        $record->children->count() > 0 => 'info',
                        default => 'gray'
                    }),

                Tables\Columns\TextColumn::make('parent.label')
                    ->formatStateUsing(function (MenuItem $record): ?string {
                        if (!$record->parent) return null;
                        $parentLevel = $record->parent->getLevel() + 1;
                        return "Cấp {$parentLevel}: " . $record->parent->label;
                    })
                    ->searchable()
                    ->label('Menu cha')
                    ->badge()
                    ->color(fn (MenuItem $record): string => 
                        $record->parent ? 'info' : 'gray'
                    ),

                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->label('Loại'),

                Tables\Columns\TextColumn::make('url')
                    ->getStateUsing(fn (MenuItem $record): string => $record->getUrl())
                    ->color('gray')
                    ->size('sm')
                    ->label('URL')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('order')
                    ->sortable()
                    ->label('Thứ tự')
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                ])
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
            'edit' => Pages\EditMenuItem::route('/{record}/edit')
        ];
    }
}
