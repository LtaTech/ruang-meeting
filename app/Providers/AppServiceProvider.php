<?php

namespace App\Providers;

use App\Filament\Resources\BranchResource;
use App\Filament\Resources\RoomResource;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
// use Filament\Pages\Dashboard;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            Filament::registerViteTheme('resources/css/app.css');
        });

        Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {
            return $builder->groups([
                NavigationGroup::make('')
                    ->collapsible(false)
                    ->items([
                        NavigationItem::make('Dashboard')
                            ->icon('heroicon-o-home')
                            ->activeIcon('heroicon-s-home')
                            ->isActiveWhen(fn (): bool => request()->routeIs('filament.pages.dashboard'))
                            ->url(route('filament.pages.dashboard')),
                    ]),
                NavigationGroup::make('')
                    ->items([
                        ...RoomResource::getNavigationItems()
                    ]),
                NavigationGroup::make('Master Data')
                    ->items([
                        ...BranchResource::getNavigationItems()
                    ]),
            ]);
        });
    }
}
