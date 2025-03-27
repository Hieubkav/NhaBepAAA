<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Image;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $modelLabel = 'Sản phẩm';

    protected static ?string $pluralModelLabel = 'Sản phẩm';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin cơ bản')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên sản phẩm')
                            ->required()
                            ->placeholder('Nhập tên sản phẩm')
                            ->maxLength(255),

                        Forms\Components\RichEditor::make('description')
                            ->label('Mô tả')
                            ->required()
                            ->toolbarButtons(['bold', 'italic', 'link', 'orderedList', 'bulletList'])
                            ->placeholder('Nhập mô tả sản phẩm'),

                        Forms\Components\Select::make('cat_id')
                            ->label('Danh mục')
                            ->relationship('cat', 'name')
                            ->placeholder('Chọn danh mục')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Tên danh mục')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('description')
                                    ->label('Mô tả'),
                                Forms\Components\Toggle::make('is_visible')
                                    ->label('Hiển thị')
                                    ->default(true),
                            ])
                            ->editOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Tên danh mục')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('description')
                                    ->label('Mô tả'),
                                Forms\Components\Toggle::make('is_visible')
                                    ->label('Hiển thị')
                                    ->default(true),
                            ]),

                        Forms\Components\Toggle::make('is_visible')
                            ->label('Hiển thị')
                            ->default(true),
                    ])->columns(1),

                Forms\Components\Section::make('Hình ảnh sản phẩm')
                    ->schema([
                        Forms\Components\FileUpload::make('temp_images')
                            ->label('Hình ảnh')
                            ->multiple()
                            ->image()
                            ->imageEditor()
                            ->maxFiles(10)
                            ->disk('public')
                            ->directory('images/pic')
                            ->downloadable()
                            ->reorderable()
                            ->columnSpanFull()
                            ->maxSize(5120)
                            ->imagePreviewHeight('150')
                            ->loadingIndicatorPosition('left')
                            ->panelLayout('grid')
                            ->removeUploadedFileButtonPosition('center')
                            ->uploadButtonPosition('center')
                            ->uploadProgressIndicatorPosition('center')
                            ->columns(4)
                    ])
                    ->collapsible()
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('images.url')
                    ->label('Hình ảnh')
                    ->circular()
                    ->limit(1),

                Tables\Columns\TextColumn::make('name')
                    ->label('Tên sản phẩm')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('cat.name')
                    ->label('Danh mục')
                    ->sortable(),

                Tables\Columns\TextColumn::make('versions_count')
                    ->label('Số phiên bản')
                    ->counts('versions'),

                Tables\Columns\IconColumn::make('is_visible')
                    ->label('Hiển thị')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('cat_id')
                    ->label('Danh mục')
                    ->relationship('cat', 'name')
                    ->placeholder('Tất cả'),
                Tables\Filters\TernaryFilter::make('is_visible')
                    ->label('Trạng thái hiển thị')
                    ->placeholder('Tất cả')
                    ->trueLabel('Đang hiển thị')
                    ->falseLabel('Đang ẩn'),
            ])
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
        return [
            RelationManagers\VersionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
