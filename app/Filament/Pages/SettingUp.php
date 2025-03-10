<?php

    namespace App\Filament\Pages;

    use App\Models\Setting;
    use Filament\Forms;
    use Filament\Pages\Page;
    use Filament\Forms\Form;
    use Filament\Notifications\Notification;
    use Illuminate\Support\Facades\Storage;

    class SettingUp extends Page implements Forms\Contracts\HasForms
    {
        use Forms\Concerns\InteractsWithForms;

        protected static string $view = 'filament.pages.setting-up';

        protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
        protected static ?int $navigationSort = 8;

        protected static ?string $navigationLabel = 'Cài đặt';

        protected static ?string $title = 'Cài đặt';

        public ?array $data = [];

        public Setting $setting;

        public function mount(): void
        {
            $this->setting = Setting::firstOrCreate();
            $this->form->fill($this->setting->toArray());
        }

        public function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\Section::make('Thông tin cơ bản')
                        ->schema([
                            Forms\Components\TextInput::make('brand_name')
                                ->label('Tên thương hiệu')
                                ->required(),

                            Forms\Components\TextInput::make('solgan')
                                ->label('Slogan')
                                ->required(),

                            Forms\Components\FileUpload::make('logo')
                                ->label('Logo thương hiệu')
                                ->image()
                                ->directory('images')
                                ->required(),
                        ]),

                    Forms\Components\Section::make('Thông tin liên hệ')
                        ->schema([
                            Forms\Components\TextInput::make('email')
                                ->label('Email')
                                ->email()
                                ->required(),

                            Forms\Components\TextInput::make('sdt')
                                ->label('Số điện thoại')
                                ->tel()
                                ->required(),

                            Forms\Components\TextInput::make('address')
                                ->label('Địa chỉ')
                                ->required(),

                            Forms\Components\TextInput::make('zalo')
                                ->label('Số Zalo')
                                ->required(),

                            Forms\Components\TextInput::make('facebook')
                                ->label('Link Facebook')
                                ->required(),

                            Forms\Components\FileUpload::make('video')
                                ->label('Video')
                                ->directory('images/pic')
                                ->acceptedFileTypes(['video/mp4', 'video/quicktime','video/webm' ])
                                ->maxSize(50120),

                            Forms\Components\Textarea::make('map')
                                ->label('Mã nhúng Google Maps')
                                ->rows(3),
                        ]),
                ])
                ->statePath('data');
        }

        public function save(): void
        {
            $data = $this->form->getState();
            $this->setting->fill($data)->save();

            Notification::make()
                ->success()
                ->title('Lưu cài đặt thành công')
                ->send();
        }
    }
