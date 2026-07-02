<?php

namespace App\Http\Controllers;

use App\Models\Adsmodel;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\CertificatePageSection;
use App\Models\HomepageStat;
use App\Models\Product;
use App\Models\SocialMediaLinks;
use App\Models\Video;
use App\Models\Page;
use App\Models\CorporateMedia;
use App\Models\FooterSetting;
use App\Models\News;
use App\Models\Section;
use App\Models\Testimonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        // Certificates
        $pagesection = CertificatePageSection::where('section_type', 'section')
            ->where('home_image', '!=', null)
            ->select('id', 'home_image', 'title')
            ->where('is_active', 1)
            ->orderBy('order', 'asc')
            ->get();

        // Basic Data
        $videos = Video::where('is_active', 1)->orderBy('sequence_no', 'asc')->get();
        $banner = Banner::where('is_active', 1)->first();
        $statSection = HomepageStat::where('is_active', 1)->get();
        $achievementSetting = HomepageStat::whereNotNull('section_heading')
            ->whereNotNull('section_description')
            ->first();
        $socialLinks = SocialMediaLinks::where('is_active', 1)
            ->orderBy('display_order')
            ->get();

        // Manufacturing Key Section
        $manufacturingPage = Page::where('slug', 'manufacturing-strenght')
            ->with(['sections.layouts.points'])
            ->first();

        $keyStrength = null;
        $keyStrengthImage = null;

        if ($manufacturingPage) {

            // First layout that contains a paragraph
            $keyStrength = $manufacturingPage->sections
                ->flatMap(fn($section) => $section->layouts)
                ->first(function ($layout) {
                    return !empty($layout->paragraph);
                });

            // First image found anywhere
            $keyStrengthImage = $manufacturingPage->sections
                ->flatMap(fn($section) => $section->layouts)
                ->firstWhere('image', '!=', null);
        }

        // $keyStrengthContent = '';

        // if ($keyStrength) {

        //     preg_match_all('/<p\b[^>]*>(.*?)<\/p>/is', $keyStrength->paragraph, $matches);

        //     $previewParagraphs = array_slice($matches[0], 0, 3);

        //     $keyStrengthContent = !empty($previewParagraphs)
        //         ? implode('', $previewParagraphs)
        //         : Str::limit(strip_tags($keyStrength->paragraph), 500);
        // }
        // International Business Section
        $internationalBusiness = Page::where('slug', 'international-business')
            ->with(['sections.layouts.points'])
            ->first();
        $business = null;
        $businessImage = null;

        if ($internationalBusiness) {

            $layouts = $internationalBusiness->sections
                ->flatMap(fn($section) => $section->layouts);

            // First layout that has paragraph
            $business = $layouts->first(function ($layout) {
                return !empty($layout->paragraph);
            });

            // First image found
            $businessImage = $layouts->firstWhere('image', '!=', null);
        }

        // Company Profile
        $companyProfile = Section::where('section_key', 'Company Profile')->first();

        // News
        $news = News::where('is_active', 'Active')
            ->where('section_type', 'Industry News')
            ->orderBy('date', 'desc')
            ->take(10)
            ->get();

        // Testimonials
        $testimonials = Testimonal::where('is_active', 'Active')
            ->orderBy('date', 'desc')
            ->get();

        $setting = Testimonal::whereNotNull('heading')
            ->latest()
            ->first();

        $activeModel = Adsmodel::where('status', 1)
            ->orderBy('id', 'desc')
            ->first();

        $certificateSection = CertificatePageSection::select(
            'id',
            'home_title',
            'home_banner'
        )
            ->whereNotNull('home_title')
            ->whereNotNull('home_banner')
            ->first();

        $HomepageText = Banner::select('title', 'subtitle')
            ->whereNull('banner_image')
            ->whereNotNull('title')
            ->whereNotNull('subtitle')
            ->first();

        return view('index', compact('pagesection', 'videos', 'banner', 'statSection', 'socialLinks', 'manufacturingPage', 'keyStrengthImage', 'keyStrength', 'internationalBusiness', 'business', 'companyProfile', 'news', 'testimonials', 'businessImage', 'setting', 'achievementSetting', 'activeModel', 'certificateSection', 'HomepageText'));
    }

    public function contactUs()
    {
        return view('contact');
    }

    public function aboutCompany()
    {
        $sections = Section::with('items')->get();
        return view('about.about-company', compact('sections'));
    }

    public function certificate()
    {
        $pageSections = CertificatePageSection::where('section_type', 'section')
            ->where('is_active', 1)
            ->orderBy('order', 'asc')->get();
        $heroSection = CertificatePageSection::where('section_type', 'hero')
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')->first();

        return view('about.certificate', compact('pageSections', 'heroSection'));
    }

    public function qualityPolicy()
    {
        return view('about.quality-policy');
    }

    public function corporateOverview()
    {
        $videos = CorporateMedia::where('type', 'video')
            ->where('status', 1)
            ->latest()
            ->first();
        $footer = FooterSetting::get()->first();
        return view('about.corporate-overview', compact('videos', 'footer'));
    }

    public function domesticBrandBusiness()
    {
        return view('business-areas.domestic-brand-business');
    }

    public function institutionalBusiness()
    {
        return view('business-areas.institutional-business');
    }

    public function internationalBusiness()
    {
        return view('business-areas.international-business');
    }

    public function contractManufacturing()
    {
        return view('business-areas.contract-manufacturing');
    }

    public function growWithKalyani()
    {
        return view('business-areas.grow-with-kalyani');
    }

    public function manufacturingStrength()
    {
        return view('key-strengths.manufacturing-strength');
    }

    public function researchDevelopment()
    {
        return view('key-strengths.research-and-development');
    }

    public function productDevelopment()
    {
        return view('key-strengths.product-development');
    }

    public function marketingNetwork()
    {
        return view('key-strengths.marketing-network');
    }

    public function packaging()
    {
        return view('key-strengths.packaging');
    }

    public function bloglist()
    {
        $blogs = Blog::where('is_active', 'active')->orderBy('created_at', 'desc')->get();

        return view('blog.bloglist', compact('blogs'));
    }

    public function blogdetail($slug)
    {
        $post = Blog::where('slug', $slug)->where('is_active', 'active')->first();

        if (! $post) {
            abort(404);
        }
        $otherBlogs = Blog::where('is_active', 'active')
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('blog.blogdetail', compact('post', 'otherBlogs'));
    }

    // BACKEND
    public function dashboard(Request $req)
    {
        $product = Product::where('title', '<>', null)->orderBy('id', 'desc')->paginate(15);

        return view('admin.dashboard', ['product' => $product]);
    }

    public function show($slug)
    {
        Log::info('Slug received: ' . $slug);
        $page = Page::where('slug', $slug)
            ->with([
                'sections.layouts.points',
            ])
            ->firstOrFail();

        // return $page;
        return view('frontend.page', compact('page'));
    }
}
