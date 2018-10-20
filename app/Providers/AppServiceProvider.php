<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bind('url', function() {
            return new class extends UrlGeneratorOriginal
            {
                public function asset($path, $secure = null)
                {
                    return parent::asset("public/{$path}", $secure);
                }
            };
        });
    }
}
