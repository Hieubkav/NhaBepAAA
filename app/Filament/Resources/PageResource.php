<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\Actions\Action;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationGroup = 'Quản lý nội dung';

    protected static ?int $navigationSort = 3;

    public static function getNavigationLabel(): string
    {
        return 'Trang tĩnh';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Tiêu đề')
                ->required()
                ->maxLength(255),

            Forms\Components\FileUpload::make('thumbnail')
                ->label('Ảnh đại diện')
                ->directory('pages')
                ->image()
                ->imageEditor()
                ->columnSpanFull(),

            Forms\Components\RichEditor::make('content')
                ->label('Nội dung')
                ->required()
                ->columnSpanFull(),

            Forms\Components\Section::make('Tài liệu PDF')
                ->schema([
                    Forms\Components\FileUpload::make('pdf')
                        ->label('File PDF')
                        ->acceptedFileTypes(['application/pdf'])
                        ->directory('pages/pdf')
                        ->maxSize(10240)  // 10MB
                        ->downloadable(),

                    Forms\Components\Actions::make([
                        Action::make('open_pdf')
                            ->label('Xem PDF')
                            ->icon('heroicon-o-eye')
                            ->url(fn ($record) => $record && $record->pdf ? Storage::url($record->pdf) : null)
                            ->openUrlInNewTab()
                            ->visible(fn ($record) => $record && $record->pdf)
                            ->color('success')
                            ->button()
                    ])
                ])->collapsible()
                ->columnSpanFull()
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('URL')
                    ->formatStateUsing(function ($state) {
                        return url("/pages/{$state}");
                    })
                    ->copyable()
                    ->copyMessage('Đã sao chép URL')
                    ->url(fn ($record) => url("/pages/{$record->id}"), true),

                Tables\Columns\TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Ảnh đại diện'),

                Tables\Columns\TextColumn::make('pdf')
                    ->label('Tài liệu PDF')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return 'Chưa có PDF';
                        return 'Có PDF';
                    })
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'gray')
                    ->icon('heroicon-o-document'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('open_pdf')
                    ->label('Xem PDF')
                    ->icon('heroicon-o-eye')
                    ->button()
                    ->color('success')
                    ->url(fn ($record) => $record->pdf ? Storage::url($record->pdf) : null)
                    ->openUrlInNewTab()
                    ->hidden(fn ($record) => !$record->pdf)
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                ])
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit')
        ];
    }
}