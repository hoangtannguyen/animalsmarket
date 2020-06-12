<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\ProductAcce;
use App\ProductNawing;
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
       view()->composer('home.partials.herobegin',function($view){
            $types = ProductType::all();
            $view->with('types',$types);
       });

       view()->composer('home.partials.copy',function($view){
        $types = ProductType::all();
        $view->with('types',$types);
   });


     view()->composer('home.partials.header',function($view){
             $acce = ProductAcce::all();
             $view->with('acce',$acce);
             $nawing = ProductNawing::all();
             $view->with('nawing',$nawing);
       });
    }
}
