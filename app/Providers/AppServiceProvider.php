<?php

namespace App\Providers;

use App\Http\Requests\CurrencyRepositoryProviderInterface;
use App\Repositories\CurrencyRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->resolving(function ($request, $app) {
            if ($request instanceof CurrencyRepositoryProviderInterface) {
                $request->setRepository(app(CurrencyRepository::class));
            }
        });
    }
}
