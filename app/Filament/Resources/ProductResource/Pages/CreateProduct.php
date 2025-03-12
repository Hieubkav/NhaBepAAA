<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function afterCreate(): void
    {
        $data = $this->form->getRawState();
        
        if (isset($data['temp_images'])) {
            foreach ((array)$data['temp_images'] as $image) {
                // Đảm bảo đường dẫn được lưu đúng định dạng
                $url = str_starts_with($image, 'images/pic/') ? $image : 'images/pic/' . $image;
                $this->record->images()->create(['url' => $url]);
            }
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
