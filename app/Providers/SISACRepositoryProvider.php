<?php

namespace SISAC\Providers;

use Illuminate\Support\ServiceProvider;

class SISACRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\SISAC\Repositories\CursoRepository::class, \SISAC\Repositories\CursoRepositoryEloquent::class);
        $this->app->bind(\SISAC\Repositories\AlunoRepository::class, \SISAC\Repositories\AlunoRepositoryEloquent::class);
        $this->app->bind(\SISAC\Repositories\AlunoCursoRepository::class, \SISAC\Repositories\AlunoCursoRepositoryEloquent::class);
    }
}
