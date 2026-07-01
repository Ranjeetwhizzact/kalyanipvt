<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CorporateMedia;
use App\Models\FooterLink;
use App\Models\FooterSetting;
use App\Models\Menu;
use App\Models\SocialMediaLinks;
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

        $footerLinks = FooterLink::where('is_active', 1)
            ->orderBy('column_group')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('column_group');

        $footerSetting = FooterSetting::first();

        $socialLinks = SocialMediaLinks::where('is_active', 1)
            ->orderBy('display_order')
            ->get();

        $view->with([
            'categories'        => $categories,
            'corporateBrochure' => $corporateBrochure,
            'headerMenu'        => $headerMenu,
            'contactDetails'    => $contactDetails,
            'footerLinks'       => $footerLinks,
            'footerSetting'     => $footerSetting,
            'socialLinks'       => $socialLinks,
        ]);
    });
}
}
