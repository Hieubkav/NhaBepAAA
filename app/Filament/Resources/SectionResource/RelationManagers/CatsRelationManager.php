<?php

namespace App\Filament\Resources\SectionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Resources\CatResource;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Cat;
use Filament\Notifications\Notification;

class CatsRelationManager extends RelationManager
{
    protected static string $relationship = 'cats';
    
    protected static ?string $title = 'Danh mục';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên danh mục')
                            ->required()
                            ->maxLength(255),
                            
                        Forms\Components\FileUpload::make('icon')
                            ->label('Icon')
                            ->required()
                            ->image()
                            ->directory('cats/icons'),
                            
                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('Ảnh đại diện')
                            ->image()
                            ->directory('cats')
                            ->required(),
                            
                        Forms\Components\RichEditor::make('description')
                            ->label('Mô tả')
                            ->required()
                            ->columnSpanFull(),
                            
                        Forms\Components\Toggle::make('status')
                            ->label('Hiện/Ẩn')
                            ->default(true)
                            ->required(),
                    ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Ảnh'),
                    
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên danh mục')
                    ->searchable(),
                    
                Tables\Columns\IconColumn::make('status')
                    ->label('Trạng thái')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('status')
                    ->label('Trạng thái')
                    ->placeholder('Tất cả')
                    ->trueLabel('Đang hiện')
                    ->falseLabel('Đang ẩn')
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\Action::make('include_categories')
                    ->label('Thêm danh mục có sẵn')
                    ->color(Color::Blue)
                    ->icon('heroicon-o-plus-circle')
                    ->form([
                        Forms\Components\CheckboxList::make('categories')
                            ->label('Chọn danh mục')
                            ->options(fn () => Cat::whereNull('section_id')->pluck('name', 'id'))
                            ->required()
                            ->columns(2),
                    ])
                    ->action(function (array $data): void {
                        foreach ($data['categories'] as $categoryId) {
                            Cat::where('id', $categoryId)->update(['section_id' => $this->getOwnerRecord()->id]);
                        }
                        
                        Notification::make()
                            ->title('Đã thêm danh mục thành công')
                            ->success()
                            ->send();
                    }),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('remove_from_section')
                    ->label('Bớt khỏi phân mục')
                    ->icon('heroicon-o-minus-circle')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->action(function (Cat $record): void {
                        $record->update(['section_id' => null]);
                        
                        Notification::make()
                            ->title('Đã bớt danh mục khỏi phân mục')
                            ->success()
                            ->send();
                    }),
                Tables\Actions\Action::make('view_in_cat')
                    ->label('Xem trong danh mục')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(fn ($record): string => CatResource::getUrl('edit', ['record' => $record]))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('remove_from_section')
                        ->label('Bớt khỏi phân mục')
                        ->icon('heroicon-o-minus-circle')
                        ->color('warning')
                        ->requiresConfirmation()
                        ->action(function (Collection $records): void {
                            $records->each(fn ($record) => $record->update(['section_id' => null]));
                            
                            Notification::make()
                                ->title('Đã bớt các danh mục khỏi phân mục')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\BulkAction::make('toggleStatus')
                        ->label('Thay đổi trạng thái')
                        ->icon('heroicon-o-eye')
                        ->action(function (Collection $records): void {
                            foreach ($records as $record) {
                                $record->update(['status' => !$record->status]);
                            }
                        })
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\Action::make('create')
                    ->label('Thêm danh mục')
                    ->icon('heroicon-o-plus')
                    ->button()
            ]);
    }
}