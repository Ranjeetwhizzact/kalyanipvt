<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CorporateMedia;
use App\Models\Menu;
use App\Models\contact;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
    Paginator::useTailwind();

    view()->composer('*', function ($view) {

        $categories = Category::with('subcategories')->get();

        $corporateBrochure = CorporateMedia::where('type', 'brochure')
            ->where('status', 1)
            ->latest()
            ->first();

        $headerMenu = Menu::where('location', 'header')
            ->with([
                'items' => function ($query) {
                    $query->where('status', 'active');
                },
                'items.page'
            ])
            ->get();

        $contactDetails = Contact::where('status', 1)->get();

        $view->with([
            'categories'        => $categories,
            'corporateBrochure' => $corporateBrochure,
            'headerMenu'        => $headerMenu,
            'contactDetails'    => $contactDetails,
        ]);
    });
}
}
