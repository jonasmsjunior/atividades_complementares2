<?php

namespace SISAC\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\SISAC\Repositories\AlunoRepository::class, \SISAC\Repositories\AlunoRepositoryEloquent::class);
        $this->app->bind(\SISAC\Repositories\AlunoCursoRepository::class, \SISAC\Repositories\AlunoCursoRepositoryEloquent::class);
        $this->app->bind(\SISAC\Repositories\AtividadesRepository::class, \SISAC\Repositories\AtividadesRepositoryEloquent::class);
        $this->app->bind(\SISAC\Repositories\AtividadeRepository::class, \SISAC\Repositories\AtividadeRepositoryEloquent::class);
        $this->app->bind(\SISAC\Repositories\TipoAtividadeRepository::class, \SISAC\Repositories\TipoAtividadeRepositoryEloquent::class);
        $this->app->bind(\SISAC\Repositories\AtividadeTipoAtividadeRepository::class, \SISAC\Repositories\AtividadeTipoAtividadeRepositoryEloquent::class);
        $this->app->bind(\SISAC\Repositories\AlunoCursoAtividadeRepository::class, \SISAC\Repositories\AlunoCursoAtividadeRepositoryEloquent::class);
        $this->app->bind(\SISAC\Repositories\ProfessorResponsavelCursoRepository::class, \SISAC\Repositories\ProfessorResponsavelCursoRepositoryEloquent::class);
        $this->app->bind(\SISAC\Repositories\ProfessorResponsavelRepository::class, \SISAC\Repositories\ProfessorResponsavelRepositoryEloquent::class);
        //:end-bindings:
    }
}
