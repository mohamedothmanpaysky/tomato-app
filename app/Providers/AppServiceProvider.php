<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       
        TomatoMenu::register([

             Menu::make()
             ->group(__('Customer'))
             ->label(__('Customer'))
             ->icon('bx bx-lock')
             ->route('admin.customer.index')
     ]);
    }
}
