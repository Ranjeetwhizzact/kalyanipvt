<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CorporateMedia;
use App\Models\FooterLink;
use App\Models\FooterSetting;
use App\Models\Menu;
use App\Models\SocialMediaLinks;
use App\Models\Contact;
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

            $corporateBrochure = CorporateMedia::query()->where('type', 'brochure')
                ->where('status', 1)
                ->latest()
                ->first();

            $headerMenu = Menu::query()->where('location', 'header')
                ->with([
                    'items' => function ($query) {
                        $query->where('status', 'active');
                    },
                    'items.page'
                ])
                ->get();

            $contactDetails = Contact::query()->where('status', 'active')->get();

            $contactSettings = \App\Models\ContactPageSetting::first();

            $footerLinks = FooterLink::query()->where('is_active', 1)
                ->orderBy('column_group')
                ->orderBy('sort_order')
                ->get()
                ->groupBy('column_group');

            $footerSetting = FooterSetting::first();

            $socialLinks = SocialMediaLinks::query()->where('is_active', 1)
                ->orderBy('display_order')
                ->get();

            $view->with([
                'categories'        => $categories,
                'corporateBrochure' => $corporateBrochure,
                'headerMenu'        => $headerMenu,
                'contactDetails'    => $contactDetails,
                'contactSettings'   => $contactSettings,
                'footerLinks'       => $footerLinks,
                'footerSetting'     => $footerSetting,
                'socialLinks'       => $socialLinks,
            ]);
        });
    }
}
