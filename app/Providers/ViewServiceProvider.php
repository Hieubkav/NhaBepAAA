<?php

namespace App\Providers;

use App\Models\Cat;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $settings = cache()->remember('site-settings-' . Setting::count(), now()->addMinutes(60), function () {
                $settings = Setting::first();
                
                if (!$settings) {
                    $settings = new Setting([
                        'brand_name' => config('app.name'),
                        'solgan' => 'Chuyên gia giải pháp bếp',
                        'address' => 'Đang cập nhật',
                        'sdt' => 'Đang cập nhật',
                        'email' => 'contact@' . config('app.domain', 'example.com'),
                    ]);
                }
                
                return $settings;
            });
            
            // Thêm danh mục sản phẩm vào view
            $cats = cache()->remember('categories-' . Cat::count(), now()->addMinutes(60), function () {
                return Cat::where('is_visible', true)->get();
            });
            
            $view->with([
                'settings' => $settings,
                'cats' => $cats
            ]);
        });
    }
}
