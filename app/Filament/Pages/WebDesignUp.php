<?php

namespace App\Filament\Pages;

use App\Models\WebDesign;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Notifications\Notification;

class WebDesignUp extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-window';
    protected static ?int $navigationSort = 9;
    protected static ?string $navigationLabel = 'Thiết kế giao diện';
    protected static ?string $title = 'Thiết kế giao diện';
    protected static string $view = 'filament.pages.web-design-up';

    public ?array $data = [];
    public WebDesign $webdesign;

    public function mount(): void
    {
        $this->webdesign = WebDesign::firstOrCreate();
        $this->form->fill($this->webdesign->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make([
                    'default' => 1,
                    'sm' => 2,
                    'lg' => 3,
                    'xl' => 4
                ])
                ->schema([
                    // Footer section
                    Forms\Components\Section::make('Phần Footer')
                        ->description('Quản lý nội dung hiển thị ở footer')
                        ->collapsible()
                        ->collapsed()
                        ->columnSpan([
                            'default' => 1,
                            'sm' => 2,
                            'lg' => 3,
                            'xl' => 4
                        ])
                        ->schema([
                            Forms\Components\TextInput::make('footer_title')
                                ->label('Tiêu đề footer')
                                ->required()
                                ->columnSpan('full'),
                            Forms\Components\Grid::make(4)
                                ->schema([
                                    Forms\Components\Group::make([
                                        Forms\Components\Textarea::make('footer_content1')
                                            ->label('Nội dung footer 1')
                                            ->rows(3),
                                        Forms\Components\TextInput::make('footer_link1')
                                            ->label('Link 1'),
                                    ])->columnSpan(1),
                                    Forms\Components\Group::make([
                                        Forms\Components\Textarea::make('footer_content2')
                                            ->label('Nội dung footer 2')
                                            ->rows(3),
                                        Forms\Components\TextInput::make('footer_link2')
                                            ->label('Link 2'),
                                    ])->columnSpan(1),
                                    Forms\Components\Group::make([
                                        Forms\Components\Textarea::make('footer_content3')
                                            ->label('Nội dung footer 3')
                                            ->rows(3),
                                        Forms\Components\TextInput::make('footer_link3')
                                            ->label('Link 3'),
                                    ])->columnSpan(1),
                                    Forms\Components\Group::make([
                                        Forms\Components\Textarea::make('footer_content4')
                                            ->label('Nội dung footer 4')
                                            ->rows(3),
                                        Forms\Components\TextInput::make('footer_link4')
                                            ->label('Link 4'),
                                    ])->columnSpan(1),
                                ]),
                        ]),

                    // Services section
                    Forms\Components\Section::make('Phần Dịch vụ')
                        ->description('Quản lý thông tin các dịch vụ')
                        ->collapsible()
                        ->collapsed()
                        ->columnSpan([
                            'default' => 1,
                            'sm' => 2,
                            'lg' => 2
                        ])
                        ->schema([
                            Forms\Components\Group::make([
                                Forms\Components\Toggle::make('service_status')
                                    ->label('Hiển thị phần dịch vụ')
                                    ->inline()
                                    ->default(true),
                                Forms\Components\TextInput::make('service_title')
                                    ->label('Tiêu đề dịch vụ'),
                                Forms\Components\Textarea::make('service_des')
                                    ->label('Mô tả dịch vụ')
                                    ->rows(3),
                                Forms\Components\FileUpload::make('service_pic')
                                    ->label('Ảnh dịch vụ')
                                    ->image()
                                    ->directory('images/services'),
                            ]),

                            Forms\Components\Tabs::make('Dịch vụ con')
                                ->tabs([
                                    Forms\Components\Tabs\Tab::make('Dịch vụ 1')
                                        ->schema($this->getServiceSubFields(1)),
                                    Forms\Components\Tabs\Tab::make('Dịch vụ 2')
                                        ->schema($this->getServiceSubFields(2)),
                                    Forms\Components\Tabs\Tab::make('Dịch vụ 3')
                                        ->schema($this->getServiceSubFields(3)),
                                    Forms\Components\Tabs\Tab::make('Dịch vụ 4')
                                        ->schema($this->getServiceSubFields(4)),
                                ]),
                        ]),

                    // Vision section
                    Forms\Components\Section::make('Phần Tầm nhìn')
                        ->description('Quản lý thông tin về tầm nhìn')
                        ->collapsible()
                        ->collapsed()
                        ->columnSpan('full')
                        ->schema([
                            Forms\Components\Grid::make(2)
                                ->schema([
                                    Forms\Components\Toggle::make('vision_status')
                                        ->label('Hiển thị phần tầm nhìn')
                                        ->inline()
                                        ->default(true),
                                    Forms\Components\Textarea::make('vision_des')
                                        ->label('Mô tả tầm nhìn')
                                        ->rows(3),
                                ]),

                            Forms\Components\Grid::make(3)
                                ->schema([
                                    Forms\Components\Group::make([
                                        Forms\Components\FileUpload::make('vision_content_logo_1')
                                            ->label('Logo 1')
                                            ->image()
                                            ->directory('images/vision'),
                                        Forms\Components\TextInput::make('vision_content_title_1')
                                            ->label('Tiêu đề 1'),
                                        Forms\Components\Textarea::make('vision_content_des_1')
                                            ->label('Mô tả 1')
                                            ->rows(3),
                                    ]),
                                    Forms\Components\Group::make([
                                        Forms\Components\FileUpload::make('vision_content_logo_2')
                                            ->label('Logo 2')
                                            ->image()
                                            ->directory('images/vision'),
                                        Forms\Components\TextInput::make('vision_content_title_2')
                                            ->label('Tiêu đề 2'),
                                        Forms\Components\Textarea::make('vision_content_des_2')
                                            ->label('Mô tả 2')
                                            ->rows(3),
                                    ]),
                                    Forms\Components\Group::make([
                                        Forms\Components\FileUpload::make('vision_content_logo_3')
                                            ->label('Logo 3')
                                            ->image()
                                            ->directory('images/vision'),
                                        Forms\Components\TextInput::make('vision_content_title_3')
                                            ->label('Tiêu đề 3'),
                                        Forms\Components\Textarea::make('vision_content_des_3')
                                            ->label('Mô tả 3')
                                            ->rows(3),
                                    ]),
                                ]),
                        ]),

                    // Map section
                    Forms\Components\Section::make('Phần Bản đồ')
                        ->description('Quản lý thông tin bản đồ')
                        ->collapsible()
                        ->collapsed()
                        ->columnSpan([
                            'default' => 1,
                            'lg' => 2
                        ])
                        ->schema([
                            Forms\Components\Grid::make(2)
                                ->schema([
                                    Forms\Components\Group::make([
                                        Forms\Components\Toggle::make('map_status')
                                            ->label('Hiển thị phần bản đồ')
                                            ->inline()
                                            ->default(true),
                                        Forms\Components\TextInput::make('map_title')
                                            ->label('Tiêu đề bản đồ'),
                                        Forms\Components\Textarea::make('map_des')
                                            ->label('Mô tả bản đồ')
                                            ->rows(3),
                                    ]),
                                    Forms\Components\Textarea::make('map_link')
                                        ->label('Link Google Maps')
                                        ->rows(4),
                                ]),
                        ]),
                ]),
            ])
            ->statePath('data');
    }

    protected function getServiceSubFields($number): array
    {
        return [
            Forms\Components\Grid::make(3)
                ->schema([
                    Forms\Components\FileUpload::make("service_sub_logo_{$number}")
                        ->label('Logo')
                        ->image()
                        ->directory('images/services'),
                    Forms\Components\TextInput::make("service_sub_title_{$number}")
                        ->label('Tiêu đề'),
                    Forms\Components\Textarea::make("service_sub_des_{$number}")
                        ->label('Mô tả')
                        ->rows(3),
                ]),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $this->webdesign->fill($data)->save();

        Notification::make()
            ->success()
            ->title('Lưu thiết kế thành công')
            ->send();
    }
}