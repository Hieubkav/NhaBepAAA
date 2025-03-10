<?php

namespace App\Filament\Resources\CatResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    protected static ?string $title = 'Sản phẩm';

    protected static ?string $modelLabel = 'sản phẩm';

    protected static ?string $pluralModelLabel = 'sản phẩm';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Tên sản phẩm')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->label('Mô tả')
                    ->required(),
                Forms\Components\Toggle::make('is_visible')
                    ->label('Hiển thị')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên sản phẩm')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('versions_count')
                    ->label('Số phiên bản')
                    ->counts('versions'),
                Tables\Columns\TextColumn::make('images_count')
                    ->label('Số hình ảnh')
                    ->counts('images'),
                Tables\Columns\IconColumn::make('is_visible')
                    ->label('Hiển thị')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_visible')
                    ->label('Trạng thái hiển thị')
                    ->placeholder('Tất cả')
                    ->trueLabel('Đang hiển thị')
                    ->falseLabel('Đang ẩn'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tạo sản phẩm mới'),
                Tables\Actions\AssociateAction::make()
                    ->label('Thêm sản phẩm có sẵn')
                    ->preloadRecordSelect()
                    ->recordSelectSearchColumns(['name']),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Sửa'),
                Tables\Actions\DeleteAction::make()
                    ->label('Xóa'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Xóa'),
                    Tables\Actions\DissociateBulkAction::make()
                        ->label('Gỡ khỏi danh mục'),
                ]),
            ]);
    }
}
