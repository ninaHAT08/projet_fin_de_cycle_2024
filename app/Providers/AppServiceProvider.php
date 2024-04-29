<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\sujetexterne;
use Illuminate\Support\Facades\Gate;
use App\Models\sujets;
use App\Policies\SujetPolicy;
use App\Policies\SujetexternePolicy;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
public function boot(): void
    {
        
          
            
        Gate::policy(sujets::class, SujetPolicy::class);
        Gate::policy(sujetexterne::class, SujetexternePolicy::class);
       
    }
   
    
}
