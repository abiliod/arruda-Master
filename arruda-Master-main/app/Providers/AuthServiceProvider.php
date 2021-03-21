<?php

namespace App\Providers;

use App\Models\Admin\Permissao;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
//    protected $policies = [
//         'App\Models\Model' => 'App\Policies\ModelPolicy',
//    ];
    protected $policies = [ 'App\Model' => 'App\Policies\ModelPolicy', ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function getPermissoes() {
        return Permissao ::with('papeis')->get();
    }


//    public function boot()
    public function boot(GateContract $gate){
        foreach ($this->getPermissoes() as $permissao) {
            $gate->define($permissao->nome,
                function($user) use($permissao){
                    return $user->existePapel($permissao->papeis) || $user->existeAdmin();
                }
            );
        }


//        $this->registerPolicies();

        //
    }
}
