<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/2/22
 * Time: 14:46
 */
namespace Ccb\Version;
use Ccb\Version\Repositories\VersionRepository;
use Ccb\Version\Repositories\VersionRepositoryInterface;

class CcbVersionServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__."/../migrations");
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config.php', 'version'
        );
        $this->app->singleton(VersionRepositoryInterface::class,VersionRepository::class);
    }
}
