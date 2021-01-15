<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
   protected $namespace = 'App\Http\Controllers';
   protected $namespaceBackend = 'App\Http\Controllers';
   protected $namespaceBackendCategory = 'App\Http\Controllers\Backend\Category';
   protected $namespaceBackendCurier = 'App\Http\Controllers\Backend\Curier';
   protected $namespaceBackendCustomer = 'App\Http\Controllers\Backend\Customer';
   protected $namespaceBackendOrder = 'App\Http\Controllers\Backend\Order';
   protected $namespaceBackendPaymentGetway = 'App\Http\Controllers\Backend\PaymentGetway';
   protected $namespaceBackendSeller = 'App\Http\Controllers\Backend\Seller';
   protected $namespaceBackendSettings = 'App\Http\Controllers\Backend\Settings';
   protected $namespaceBackendShop = 'App\Http\Controllers\Backend\Shop';
   protected $namespaceFrontend = 'App\Http\Controllers\Frontend';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));

        Route::middleware('web')
             ->namespace($this->namespaceBackend)
             ->group(base_path('routes/Backend/Routes.php'));

        Route::middleware('web')
             ->namespace($this->namespaceBackendCategory)
             ->group(base_path('routes/Backend/CategoryRoutes.php'));

        Route::middleware('web')
             ->namespace($this->namespaceBackendCurier)
             ->group(base_path('routes/Backend/CurierRoutes.php'));

        Route::middleware('web')
             ->namespace($this->namespaceBackendCustomer)
             ->group(base_path('routes/Backend/CustomerRoutes.php'));

        Route::middleware('web')
             ->namespace($this->namespaceBackendOrder)
             ->group(base_path('routes/Backend/OrderRoutes.php')); 

        Route::middleware('web')
             ->namespace($this->namespaceBackendPaymentGetway)
             ->group(base_path('routes/Backend/PaymentGetwayRoutes.php'));    

        Route::middleware('web')
             ->namespace($this->namespaceBackendSeller)
             ->group(base_path('routes/Backend/SellerRoutes.php'));

        Route::middleware('web')
             ->namespace($this->namespaceBackendSettings)
             ->group(base_path('routes/Backend/SettingsRoutes.php'));

        Route::middleware('web')
             ->namespace($this->namespaceBackendShop)
             ->group(base_path('routes/Backend/ShopRoutes.php'));

        Route::middleware('web')
             ->namespace($this->namespaceFrontend)
             ->group(base_path('routes/Frontend/Routes.php'));                         


    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
