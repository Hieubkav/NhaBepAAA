<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Guide extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Hướng dẫn sử dụng';
    protected static ?string $title = 'Hướng dẫn sử dụng';
    protected static ?int $navigationSort = 9;
    protected static ?string $slug = 'huong-dan';

    protected static string $view = 'filament.pages.guide';

    public function mount(): void
    {
        // Add any initialization logic if needed
    }
}
