<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Soldier;

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
        $soldiers = Soldier::all();
        $soldiersData = [];
        foreach ($soldiers as $soldier)
        {
            array_push($soldiersData, $soldier->surname." ".$soldier->name." ".$soldier->middle_name);
        }
        View::share('soldiersData', array_unique($soldiersData));
    }
}
