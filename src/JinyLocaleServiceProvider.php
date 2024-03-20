<?php
namespace Jiny\Locale;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;

class JinyLocaleServiceProvider extends ServiceProvider
{
    private $package = "locale";
    public function boot()
    {
        // 모듈: 라우트 설정
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', $this->package);

        // 데이터베이스
        $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');


        // Publish your package's configuration file to Laravel's config path
        $this->publishes([
            __DIR__.'/../config/country.php' => config_path('locale/country.php'),
            __DIR__.'/../config/language.php' => config_path('locale/language.php'),
        ]);

        /*
        $this->publishes([
            __DIR__ . '/../Database/Seeders/Language.php' => database_path('seeders/Language.php'),
        ], 'locale-seeds');
        */

    }

    public function register()
    {

        // Merge your package's configuration with the existing configuration
        $this->mergeConfigFrom(__DIR__.'/../config/country.php', 'locale.country');
        $this->mergeConfigFrom(__DIR__.'/../config/language.php', 'locale.language');
    }

}
