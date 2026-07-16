<?php

use App\Http\Controllers\admin\AdsModelController;
use App\Http\Controllers\admin\AuthControllers;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomePageContentController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\MenuItemController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\PageSectionController;
use App\Http\Controllers\admin\ProductContorller;
use App\Http\Controllers\admin\ProductUseage;
use App\Http\Controllers\admin\CorporateMediaController;
use App\Http\Controllers\admin\CertificatePageSectionController;
use App\Http\Controllers\admin\CompanyProfileController;
use App\Http\Controllers\admin\FooterLinkController;
use App\Http\Controllers\admin\FooterSettingController;
// use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\TesimonalController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\ContactController;
// use App\Http\Controllers\DomesticBrandController;
use App\Http\Controllers\DomesticBrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\NewsViewController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//show ka error dekhe aya
// Public Routes - Place these BEFORE the wildcard route
Route::get('/index.html', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);

// About Us
Route::get('/about/contact.html', [NewsViewController::class, 'contactus'])->name('contact');
Route::post('/contact', [NewsViewController::class, 'storemessage'])->name('contact.store');
Route::get('info/company-profile.html', [HomeController::class, 'aboutCompany'])->name('company');
Route::get('/info/certificate-and-membership.html', [HomeController::class, 'certificate'])->name('certificate');
Route::get('/about/quality-policy.html', [HomeController::class, 'qualityPolicy'])->name('qualitypolicy');
Route::get('/info/corporate-overview.html', [HomeController::class, 'corporateOverview'])->name('corporateoverview');

// BUSINESS AREAS
// News
Route::get('/news/latestnews.html', [NewsViewController::class, 'newslist'])->name('latestnews');
Route::get('/news/newsdetail.html/{slug}', [NewsViewController::class, 'newsdetail'])->name('news.show');

// BUSINESS AREAS
Route::get('/business-areas/domestic-brand-business.html', [HomeController::class, 'domesticBrandBusiness'])->name('domestic.brand.business');
Route::get('/business-areas/institutional-business.html', [HomeController::class, 'institutionalBusiness'])->name('institutional.business');
Route::get('/business-areas/international-business.html', [HomeController::class, 'internationalBusiness'])->name('international.business');
Route::get('/business-areas/contract-manufacturing.html', [HomeController::class, 'contractManufacturing'])->name('contract.manufacturing');
Route::get('/business-areas/grow-with-kalyani.html', [HomeController::class, 'growWithKalyani'])->name('grow.with.kalyani');

// Key strength
Route::get('/key-strengths/manufacturing-strength.html', [HomeController::class, 'manufacturingStrength'])->name('manufacturing.strength');
Route::get('/key-strengths/research-and-development.html', [HomeController::class, 'researchDevelopment'])->name('research.development');
Route::get('/key-strengths/product-development.html', [HomeController::class, 'productDevelopment'])->name('product.development');
Route::get('/key-strengths/marketing-network.html', [HomeController::class, 'marketingNetwork'])->name('marketing.network');
Route::get('/key-strengths/packaging.html', [HomeController::class, 'packaging'])->name('packaging');

// Products
Route::get('/products.html', [ProductController::class, 'products'])->name('products');
Route::get('/product-lookup', [ProductController::class, 'lookup'])->name('product.lookup');
// Route::get('/product/agro-chemicals.html', [ProductController::class, 'agroChemicals'])->name('product.agro.chemicals');
// Route::get('/product/public-health-pesticides.html', [ProductController::class, 'publicHealthPesticides'])->name('product.public.health.pesticides');
// Route::get('/product/export-zone.html', [ProductController::class, 'exportZone'])->name('product.export.zone');

// BACKEND
Route::get('/login', [AuthControllers::class, 'show'])->name('login');
Route::post('/login', [AuthControllers::class, 'login']);
Route::get('/csrf-token', function () {
    return response()->json([
        'csrf_token' => csrf_token(),
    ]);
});
Route::post('storecontactinfo', [MailController::class, 'storecontactinfo']);

// API Routes
Route::get('/categories', [CategoryController::class, 'getCategoriesWithSubcategories']);
Route::get('/getAllsubcatgeory', [SubCategoryController::class, 'getAllsubcatgeory']);
Route::get('/category/{id}', [CategoryController::class, 'getCategorybyid']);
Route::get('/getproduct/{id}', [ProductUseage::class, 'getProductById']);
Route::get('/gettestimonal', [TesimonalController::class, 'gettestimonal']);
Route::get('/newslist', [NewsController::class, 'getnews']);
Route::get('/allproducts/{id}', [SubCategoryController::class, 'getAllproducts']);

// Admin Routes (Protected)
Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/products', [HomeController::class, 'dashboard'])->name('all.products'); // Changed from '/products'
    Route::delete('/logout', [AuthControllers::class, 'logout'])->name('logout');

    // Category Routes
    Route::get('viewcategory', [CategoryController::class, 'viewcategory'])->name('view.category');
    Route::get('newcategory', [CategoryController::class, 'newcategory'])->name('new.category');
    Route::post('storecategory', [CategoryController::class, 'storecategory'])->name('store.category');
    Route::get('editcategory/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::delete('deletecat/{id}', [CategoryController::class, 'distory'])->name('delete.category'); // Removed duplicates

    // Domestic Brand Routes
    Route::get('domestic-brand-business/', [DomesticBrandController::class, 'index'])->name('view.domestic-brand-business');
    Route::get('new-section-domestic-brand-business/', [DomesticBrandController::class, 'create'])->name('create.domestic-brand-business');
    Route::post('store', [SectionController::class, 'store'])->name('sections.store');

    // Navbar Routes
    Route::get('navbar', [NavbarController::class, 'viewnabar'])->name('admin.navbar.index');
    Route::get('createnavbar', [NavbarController::class, 'createnavbar'])->name('admin.navbar.create');
    Route::post('storenavbar', [NavbarController::class, 'store'])->name('admin.navbar.store');
    Route::post('/navbar/preview', [NavbarController::class, 'preview'])->name('admin.navbar.preview');

    // News Routes
    Route::get('viewnews', [NewsController::class, 'index'])->name('view.news');
    Route::get('createnews', [NewsController::class, 'create'])->name('create.news');
    Route::get('editnews/{id}', [NewsController::class, 'edit'])->name('edit.news');
    Route::post('storenews', [NewsController::class, 'store'])->name('store.news');
    Route::delete('deletenews/{id}', [NewsController::class, 'delete'])->name('delete.news');

    // Testimonial Routes
    Route::get('viewtest', [TesimonalController::class, 'index'])->name('view.testimonial');
    Route::get('create-settings', [TesimonalController::class, 'createSettings'])->name('create.testimonial.settings');
    Route::get('edit-settings/{id}', [TesimonalController::class, 'editSettings'])->name('edit.testimonial.settings');
    Route::post('store-settings', [TesimonalController::class, 'storeSettings'])->name('store.testimonial.settings');
    Route::post('update-settings/{id}', [TesimonalController::class, 'updateSettings'])->name('update.testimonial.settings');
    Route::get('createtest', [TesimonalController::class, 'create'])->name('create.testimonial');
    Route::get('edittest/{id}', [TesimonalController::class, 'edit'])->name('edit.testimonial');
    Route::post('storetest', [TesimonalController::class, 'store'])->name('store.testimonial');
    Route::delete('deletetest/{id}', [TesimonalController::class, 'delete'])->name('delete.testimonial');

    // Subcategory Routes
    Route::get('viewsubcategory', [SubCategoryController::class, 'viewsubcategory'])->name('view.subcategory');
    Route::get('addsubcategory', [SubCategoryController::class, 'new'])->name('add.subcategory');
    Route::post('storesubcategory', [SubCategoryController::class, 'storesubcategory'])->name('store.subcategory');
    Route::get('editsubcategory/{id}', [SubCategoryController::class, 'edit'])->name('edit.subcategory');
    Route::delete('deletesubcat/{id}', [SubCategoryController::class, 'distory'])->name('delete.subcategory');

    // Section Routes
    Route::get('viewsections', [SectionController::class, 'show']);
    Route::get('createsections', [SectionController::class, 'create'])->name('sections.create');
    Route::delete('/sections/{id}', [SectionController::class, 'destroy'])->name('sections.destroy');
    Route::get('/sections/{id}/edit', [SectionController::class, 'edit'])->name('sections.edit');

    // Product Routes
    Route::get('/get-subcategories', [ProductContorller::class, 'getSubcategories'])->name('get.subcategories');
    Route::get('/updateuseage/{id}', [ProductUseage::class, 'create']);
    Route::post('/saveattribute', [ProductUseage::class, 'store']);
    Route::get('editusage/{id}', [ProductUseage::class, 'editusage']);
    Route::get('usecreate/{id}', [ProductUseage::class, 'createuesage']);
    Route::post('/useagesave', [ProductUseage::class, 'saveusage']);
    Route::get('/newproduct', [ProductContorller::class, 'create']);
    Route::post('/saveproduct', [ProductContorller::class, 'store']);
    Route::get('/editproduct/{id}', [ProductContorller::class, 'edit']);
    Route::delete('/deleteproduct/{id}', [ProductContorller::class, 'destroy'])->name('product.destroy');
    Route::delete('/deletetable/{id}', [ProductContorller::class, 'deletetable'])->name('product.deletetable');

    // Blog Routes
    Route::get('/viewbloglist', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/newblog', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/storeblog', [BlogController::class, 'store'])->name('admin.blog-posts.store');
    Route::post('/blogupdate/{id}', [BlogController::class, 'update'])->name('admin.blog-posts.update');
    Route::get('/bloguploadimage', [BlogController::class, 'updateimgae'])->name('admin.upload-image');
    Route::get('editblog/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::post('deleteblog/{id}', [BlogController::class, 'delete'])->name('admin.blog-posts.delete');
    // Route::get('',action: [])->name();
    // Route::get('',[])->name();

    // Certificate Page Sections
    Route::get('/page-section', [CertificatePageSectionController::class, 'index'])->name('admin.certificate.page-sections.index');
    Route::get('/page-section/create', [CertificatePageSectionController::class, 'create'])->name('admin.certificate.page-sections.create');
    Route::post('/page-section', [CertificatePageSectionController::class, 'store'])->name('admin.certificate.page-sections.store');
    Route::get('/page-section/edit/{id}', [CertificatePageSectionController::class, 'edit'])->name('admin.certificate.page-sections.edit');
    Route::post('/page-section/update/{id}', [CertificatePageSectionController::class, 'update'])->name('admin.certificate.page-sections.update');
    Route::post('/page-section/{id}', [CertificatePageSectionController::class, 'destroy'])->name('admin.certificate.page-sections.destroy');
    Route::post('/page-section-banner/{id}', [CertificatePageSectionController::class, 'updatebanner'])->name('certificate.section.update');

    // Video Routes
    Route::get('/videos/get-all', [VideoController::class, 'index'])->name('admin.videos.index');
    Route::get('/videos/create', [VideoController::class, 'create'])->name('admin.videos.create');
    Route::post('/videos/store', [VideoController::class, 'store'])->name('admin.videos.store');
    Route::get('/videos/edit/{id}', [VideoController::class, 'edit'])->name('admin.videos.edit');
    Route::post('/videos/update/{id}', [VideoController::class, 'update'])->name('admin.videos.update');
    Route::post('/videos/{id}', [VideoController::class, 'destroy'])->name('admin.videos.destroy');

    // Homepage banner
    Route::get('/banner/get-all', [HomePageContentController::class, 'bannerindex'])->name('admin.banner.index');
    Route::get('banner/create', [HomePageContentController::class, 'bannercreate'])->name('admin.banner.create');
    Route::post('banner/store', [HomePageContentController::class, 'bannerstore'])->name('admin.banner.store');
    Route::get('banner/edit/{id}', [HomePageContentController::class, 'banneredit'])->name('admin.banner.edit');
    Route::post('banner/update/{id}', [HomePageContentController::class, 'bannerupdate'])->name('admin.banner.update');
    Route::post('banner/delete/{id}', [HomePageContentController::class, 'delete'])->name('admin.banner.delete');

    Route::get('/social-media/get-all', [HomePageContentController::class, 'socialindex'])->name('admin.social.index');
    Route::get('social-media/create', [HomePageContentController::class, 'socialcreate'])->name('admin.social.create');
    Route::post('social-media/store', [HomePageContentController::class, 'socialstore'])->name('admin.social.store');
    Route::get('social-media/edit/{id}', [HomePageContentController::class, 'socialedit'])->name('admin.social.edit');
    Route::post('social-media/update/{id}', [HomePageContentController::class, 'socialupdate'])->name('admin.social.update');
    Route::post('social-media/delete/{id}', [HomePageContentController::class, 'socialdelete'])->name('admin.social.delete');

    Route::get('/stat/get-all', [HomePageContentController::class, 'statindex'])->name('admin.stats.index');
    Route::get('/stat/create', [HomePageContentController::class, 'statcreate'])->name('admin.stats.create');
    Route::post('/stat/store', [HomePageContentController::class, 'statstore'])->name('admin.stats.store');
    Route::get('/stat/edit/{id}', [HomePageContentController::class, 'statedit'])->name('admin.stats.edit');
    Route::post('/stat/update/{id}', [HomePageContentController::class, 'statupdate'])->name('admin.stats.update');
    Route::post('/stat/delete/{id}', [HomePageContentController::class, 'statdelete'])->name('admin.stats.delete');
    Route::post('achievement-settings/{id}', [HomePageContentController::class, 'updateAchievementSettings'])->name('admin.stats.updateSettings');

    Route::get('/menu/get-all', [MenuController::class, 'index'])->name('admin.menus.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('admin.menus.create');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('admin.menus.store');
    Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('admin.menus.edit');
    Route::post('/menu/update/{id}', [MenuController::class, 'update'])->name('admin.menus.update');
    Route::post('/menu/delete/{id}', [MenuController::class, 'destroy'])->name('admin.menus.destroy');

    Route::get('/menu-items/get-all', [MenuItemController::class, 'index'])->name('admin.menu-items.index');
    Route::get('/menu-items/create', [MenuItemController::class, 'create'])->name('admin.menu-items.create');
    Route::post('/menu-items/store', [MenuItemController::class, 'store'])->name('admin.menu-items.store');
    Route::get('/menu-items/edit/{id}', [MenuItemController::class, 'edit'])->name('admin.menu-items.edit');
    Route::post('/menu-items/update/{id}', [MenuItemController::class, 'update'])->name('admin.menu-items.update');
    Route::post('/menu-items/delete/{id}', [MenuItemController::class, 'destroy'])->name('admin.menu-items.destroy');

    Route::get('/pages/get-all', [PageController::class, 'index'])->name('admin.pages.index');
    Route::get('/pages/create', [PageController::class, 'create'])->name('admin.pages.create');
    Route::post('/pages/store', [PageController::class, 'store'])->name('admin.pages.store');
    Route::get('/pages/edit/{id}', [PageController::class, 'edit'])->name('admin.pages.edit');
    Route::post('/pages/update/{id}', [PageController::class, 'update'])->name('admin.pages.update');
    Route::post('/pages/delete/{id}', [PageController::class, 'destroy'])->name('admin.pages.destroy');

    Route::get('/page-sections/create/{page}', [PageSectionController::class, 'create'])->name('admin.page-sections.create');
    Route::post('/page-sections/store', [PageSectionController::class, 'store'])->name('admin.page-sections.store');
    Route::get('/page-layouts/create', [PageSectionController::class, 'createLayout'])->name('admin.page-layouts.create');
    Route::post('/page-layouts/store', [PageSectionController::class, 'storeLayout'])->name('admin.page-layouts.store');
    Route::post('/points/store', [PageSectionController::class, 'storePoint'])->name('admin.points.store');
    Route::post('/sections/update/{id}', [PageSectionController::class, 'updateSection'])->name('admin.sections.update');
    Route::delete('/sections/delete/{id}', [PageSectionController::class, 'deleteSection'])->name('admin.sections.delete');
    Route::post('/layouts/update/{id}', [PageSectionController::class, 'updateLayout'])->name('admin.layouts.update');
    Route::delete('/layouts/delete/{id}', [PageSectionController::class, 'deleteLayout'])->name('admin.layouts.delete');
    Route::post('/points/update/{id}', [PageSectionController::class, 'updatePoint'])->name('admin.points.update');
    Route::delete('/points/delete/{id}', [PageSectionController::class, 'deletePoint'])->name('admin.points.delete');

    Route::post('/ckeditor/upload', [PageController::class, 'upload'])->name('ckeditor.upload');

    Route::get('/corporate-media', [CorporateMediaController::class, 'index'])->name('admin.corporate-media.index');
    Route::get('/corporate-media/create', [CorporateMediaController::class, 'create'])->name('admin.corporate-media.create');
    Route::post('/corporate-media/store', [CorporateMediaController::class, 'store'])->name('admin.corporate-media.store');
    Route::get('/corporate-media/edit/{id}', [CorporateMediaController::class, 'edit'])->name('admin.corporate-media.edit');
    Route::post('/corporate-media/update/{id}', [CorporateMediaController::class, 'update'])->name('admin.corporate-media.update');
    Route::delete('/corporate-media/delete/{id}', [CorporateMediaController::class, 'destroy'])->name('admin.corporate-media.delete');

    Route::get('/company-profile', [CompanyProfileController::class, 'index'])->name('admin.company-profile.index');
    Route::get('/company-profile/create', [CompanyProfileController::class, 'create'])->name('admin.company-profile.create');
    Route::post('/company-profile/store', [CompanyProfileController::class, 'store'])->name('admin.company-profile.store');
    Route::get('/company-profile/edit/{id}', [CompanyProfileController::class, 'edit'])->name('admin.company-profile.edit');
    Route::post('/company-profile/update/{id}', [CompanyProfileController::class, 'update'])->name('admin.company-profile.update');
    Route::delete('/company-profile/delete/{id}', [CompanyProfileController::class, 'destroy'])->name('admin.company-profile.delete');

    Route::get('/adsmodel/get-all', [AdsModelController::class, 'index'])->name('admin.adsmodels.index');
    Route::get('/adsmodel/create', [AdsModelController::class, 'create'])->name('admin.adsmodels.create');
    Route::post('/adsmodel/store', [AdsModelController::class, 'store'])->name('admin.adsmodels.store');
    Route::get('/adsmodel/edit/{id}', [AdsModelController::class, 'edit'])->name('admin.adsmodels.edit');
    Route::post('/adsmodel/update/{id}', [AdsModelController::class, 'store'])->name('admin.adsmodels.store');
    Route::delete('/adsmodel/delete/{id}', [AdsModelController::class, 'destroy'])->name('admin.adsmodels.destroy');

    Route::get('/contact/get-all', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contact/create', [ContactController::class, 'create'])->name('admin.contacts.create');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('admin.contacts.store');
    Route::get('/contact/edit/{id}', [ContactController::class, 'edit'])->name('admin.contacts.edit');
    Route::put('/contact/update/{id}', [ContactController::class, 'update'])->name('admin.contacts.update');
    Route::delete('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
    Route::get('/contact-settings/edit', [ContactController::class, 'editSettings'])->name('admin.contact-settings.edit');
    Route::put('/contact-settings/update', [ContactController::class, 'updateSettings'])->name('admin.contact-settings.update');

    Route::get('/footer-links/get-all', [FooterLinkController::class, 'index'])->name('admin.footer-links.index');
    Route::get('/footer-links/create', [FooterLinkController::class, 'create'])->name('admin.footer-links.create');
    Route::post('/footer-links/store', [FooterLinkController::class, 'store'])->name('admin.footer-links.store');
    Route::get('/footer-links/edit/{id}', [FooterLinkController::class, 'edit'])->name('admin.footer-links.edit');
    Route::put('/footer-links/update/{id}', [FooterLinkController::class, 'update'])->name('admin.footer-links.update');
    Route::delete('/footer-links/delete/{id}', [FooterLinkController::class, 'destroy'])->name('admin.footer-links.destroy');

    Route::get('/footer-settings/edit', [FooterSettingController::class, 'edit'])->name('admin.footer-settings.edit');
    Route::put('/footer-settings/update', [FooterSettingController::class, 'update'])->name('admin.footer-settings.update');
});

// WILDCARD ROUTES - ALWAYS AT THE END!
// Route::get('/bloglist', [HomeController::class, 'bloglist'])->name('blodlist');
Route::get('/bloglist', [HomeController::class, 'bloglist'])->name('bloglist');
Route::get('/blogdetail/{slug}', [HomeController::class, 'blogdetail'])->name('blogdetail');
// Route::get('/{slug}', [ProductController::class, 'displaycategory'])->name('category.show');

// WILDCARD ROUTES - ALWAYS AT THE END!
Route::get('/info/{slug}', [HomeController::class, 'show'])->name('page.show');

Route::get('/search-by-composition', [ProductController::class, 'searchByComposition'])->name('product.searchByComposition');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/{category:slug}.html', [ProductController::class, 'displaycategory'])->name('category.show');
Route::get('{subcategory}/{slug}', [ProductController::class, 'displaysubcategory'])->name('subcategory.show');
Route::get('{category}/{subcategory}/{product}', [ProductController::class, 'displayproduct'])->name('product.show');
