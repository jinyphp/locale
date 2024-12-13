<?php
namespace Jiny\Locale;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;

class JinyLocaleServiceProvider extends ServiceProvider
{
    private $package = "jiny-locale";
    public function boot()
    {
        // 모듈: 라우트 설정
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', $this->package);

        // 데이터베이스
        $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');

        // 패키지의 assets를 프로젝트의 /public 폴더로 배포
        $this->publishes([
            __DIR__.'/../public/images/flags' => public_path('images/flags'),
        ], 'public');


        // Publish your package's configuration file to Laravel's config path
        // $this->publishes([
        //     __DIR__.'/../config/country.php' => config_path('country.php'),
        //     __DIR__.'/../config/language.php' => config_path('language.php'),
        // ]);



        /*
        $this->publishes([
            __DIR__ . '/../Database/Seeders/Language.php' => database_path('seeders/Language.php'),
        ], 'locale-seeds');
        */

        // 공유값
        // $this->app->bind('seed_locale_to_run', function () {
        //     // Return the seed class name you want to run
        //     return \Jiny\Locale\Database\Seeds\Language::class;
        // });

    }

    public function register()
    {
        // 패키지의 설정 파일을 병합
        $this->mergeConfigFrom(__DIR__.'/../config/country.php', 'country');
        $this->mergeConfigFrom(__DIR__.'/../config/language.php', 'language');
    }

}
