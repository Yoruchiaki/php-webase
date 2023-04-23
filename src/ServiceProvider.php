<?php

namespace Yoruchiaki\Webase;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    /**
     * 引导包服务
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/webase.php' => config_path('webase.php'),
        ], ['yoruchiaki-webase']);
    }


    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/webase.php', 'webase'
        );

        $this->app->singleton(Webase::class, function () {
            return new Webase(new HttpRequest(
                new AppConfig(
                    config('webase.nodeManagerUrl'),
                    config('webase.appKey'),
                    config('webase.appSecret')
                )
            ));
        });

        $this->app->alias(Webase::class, 'webase');
    }

    public function provides(): array
    {
        return [Webase::class, 'webase'];
    }
}