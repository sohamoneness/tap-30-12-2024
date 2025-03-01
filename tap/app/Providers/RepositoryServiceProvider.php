<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\AdminContract;
use App\Repositories\AdminRepository;
use App\Contracts\UserContract;
use App\Repositories\UserRepository;
use App\Contracts\ArticleCategoryContract;
use App\Repositories\ArticleCategoryRepository;
use App\Contracts\ArticleSubCategoryContract;
use App\Repositories\ArticleSubCategoryRepository;
use App\Contracts\ArticleTertiaryCategoryContract;
use App\Repositories\ArticleTertiaryCategoryRepository;
use App\Contracts\ArticleContract;
use App\Repositories\ArticleRepository;
use App\Contracts\EventTypeContract;
use App\Repositories\EventTypeRepository;
use App\Contracts\EventContract;
use App\Repositories\EventRepository;
use App\Contracts\CourseContract;
use App\Repositories\CourseRepository;
use App\Contracts\CourseModuleContract;
use App\Repositories\CourseModuleRepository;
use App\Contracts\CourseTopicContract;
use App\Repositories\CourseTopicRepository;
use App\Contracts\CourseQuizContract;
use App\Repositories\CourseQuizRepository;
use App\Contracts\CourseTestimonialContract;
use App\Repositories\CourseTestimonialRepository;
use App\Contracts\DealContract;
use App\Repositories\DealRepository;
use App\Contracts\BlogContract;
use App\Repositories\BlogRepository;
use App\Contracts\CourseCategoryContract;
use App\Repositories\CourseCategoryRepository;
use App\Contracts\CourseSlideContract;
use App\Repositories\CourseSlideRepository;
use App\Contracts\CartContract;
use App\Repositories\CartRepository;
use App\Contracts\CheckoutContract;
use App\Repositories\CheckoutRepository;
use App\Contracts\MarketCategoryContract;
use App\Repositories\MarketCategoryRepository;
use App\Contracts\MarketContract;
use App\Repositories\MarketRepository;
use App\Contracts\MarketBannerContract;
use App\Repositories\MarketBannerRepository;
use App\Contracts\MarketFaqContract;
use App\Repositories\MarketFaqRepository;
use App\Contracts\SupportContract;
use App\Repositories\SupportRepository;
use App\Contracts\SupportFaqContract;
use App\Repositories\SupportFaqRepository;
use App\Contracts\SupportFaqCategoryContract;
use App\Repositories\SupportFaqCategoryRepository;
use App\Contracts\SupportWidgetContract;
use App\Repositories\SupportWidgetRepository;
use App\Contracts\ProfileContract;
use App\Repositories\ProfileRepository;
use App\Contracts\ExpertiseContract;
use App\Repositories\ExpertiseRepository;
use App\Contracts\EducationContract;
use App\Repositories\EducationRepository;
use App\Contracts\WorkExperienceContract;
use App\Repositories\WorkExperienceRepository;
use App\Contracts\PortfolioContract;
use App\Repositories\PortfolioRepository;
use App\Contracts\ClientContract;
use App\Repositories\ClientRepository;
use App\Contracts\CertificationContract;
use App\Repositories\CertificationRepository;
use App\Contracts\TestimonialContract;
use App\Repositories\TestimonialRepository;
use App\Contracts\FeedbackContract;
use App\Repositories\FeedbackRepository;
use App\Contracts\JobCategoryContract;
use App\Repositories\JobCategoryRepository;
use App\Contracts\JobContract;
use App\Repositories\JobRepository;
use App\Contracts\TemplateCategoryContract;
use App\Repositories\TemplateCategoryRepository;
use App\Contracts\TemplateSubCategoryContract;
use App\Repositories\TemplateSubCategoryRepository;
use App\Contracts\TemplateTypeContract;
use App\Repositories\TemplateTypeRepository;
use App\Contracts\TemplateContract;
use App\Repositories\TemplateRepository;
use App\Contracts\SettingsContract;
use App\Repositories\SettingsRepository;
use App\Contracts\JobEmploymentTypeContract;
use App\Repositories\JobEmploymentTypeRepository;
class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        AdminContract::class                     =>            AdminRepository::class,
        UserContract::class                      =>            UserRepository::class,
        ArticleCategoryContract::class           =>            ArticleCategoryRepository::class,
        ArticleSubCategoryContract::class        =>            ArticleSubCategoryRepository::class,
        ArticleTertiaryCategoryContract::class   =>            ArticleTertiaryCategoryRepository::class,
        ArticleContract::class                   =>            ArticleRepository::class,
        EventTypeContract::class                 =>            EventTypeRepository::class,
        EventContract::class                     =>            EventRepository::class,
        CourseContract::class                    =>            CourseRepository::class,
        CourseModuleContract::class              =>            CourseModuleRepository::class,
        CourseTopicContract::class               =>            CourseTopicRepository::class,
        CourseQuizContract::class                =>            CourseQuizRepository::class,
        CourseTestimonialContract::class         =>            CourseTestimonialRepository::class,
        BlogContract::class                      =>            BlogRepository::class,
        CourseCategoryContract::class            =>            CourseCategoryRepository::class,
        CourseSlideContract::class               =>            CourseSliderepository::class,
        CartContract::class                      =>            CartRepository::class,
        CheckoutContract::class                  =>            CheckoutRepository::class,
        MarketCategoryContract::class            =>            MarketCategoryRepository::class,
        MarketContract::class                    =>            MarketRepository::class,
        MarketBannerContract::class              =>            MarketBannerRepository::class,
        MarketFaqContract::class                 =>            MarketFaqRepository::class,
        ProfileContract::class                   =>            ProfileRepository::class,
        ExpertiseContract::class                 =>            ExpertiseRepository::class,
        EducationContract::class                 =>            EducationRepository::class,
        WorkExperienceContract::class            =>            WorkExperienceRepository::class,
        PortfolioContract::class                 =>            PortfolioRepository::class,
        ClientContract::class                    =>            ClientRepository::class,
        CertificationContract::class             =>            CertificationRepository::class,
        TestimonialContract::class               =>            TestimonialRepository::class,
        FeedbackContract::class                  =>            FeedbackRepository::class,
        JobCategoryContract::class               =>            JobCategoryRepository::class,
        JobContract::class                       =>            JobRepository::class,
        SupportContract::class                   =>            SupportRepository::class,
        SupportFaqCategoryContract::class        =>            SupportFaqCategoryRepository::class,
        SupportFaqContract::class                =>            SupportFaqRepository::class,
        SupportWidgetContract::class             =>            SupportWidgetRepository::class,
        TemplateCategoryContract::class          =>            TemplateCategoryRepository::class,
        TemplateSubCategoryContract::class       =>            TemplateSubCategoryRepository::class,
        TemplateTypeContract::class              =>            TemplateTypeRepository::class,
        TemplateContract::class                  =>            TemplateRepository::class,
        DealContract::class                      =>            DealRepository::class,
        SettingsContract::class                  =>           SettingsRepository::class,
        JobEmploymentTypeContract::class    =>     JobEmploymentTypeRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
