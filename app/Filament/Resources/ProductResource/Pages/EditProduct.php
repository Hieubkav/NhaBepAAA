<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $urls = $this->record->images()->pluck('url')->toArray();
        $data['temp_images'] = array_map(function($url) {
            return str_replace('public/', '', $url);
        }, $urls);
        
        return $data;
    }

    protected function afterSave(): void
    {
        $data = $this->form->getRawState();
        
        if (isset($data['temp_images'])) {
            $this->record->images()->delete();
            
            foreach ((array)$data['temp_images'] as $image) {
                // Đảm bảo đường dẫn được lưu đúng định dạng
                $url = str_starts_with($image, 'images/pic/') ? $image : 'images/pic/' . $image;
                $this->record->images()->create(['url' => $url]);
            }
        }
    }
}
