<?php

namespace App\Providers;

use App\Policies\BlogPostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\BlogPost' => 'App\Policies\BlogPostPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('home.secret', function ($user){
            return $user->is_admin;
        });
        /*
        Gate::define('update-post', function ($user, $post){
            return $user->id == $post->user_id;
        });
        Gate::allows('update-post', $post);
        $this->autorize('update-post', $post);

        Gate::define('delete-post', function ($user, $post){
            return $user->id == $post->user_id;
        });*/

        //Gate::define('post.update', [BlogPostPolicy::class, 'update']);
        //Gate::define('post.delete', [BlogPostPolicy::class, 'delete']);
        
        //Gate::resource('posts', BlogPostPolicy::class);
        // posts.create, posts.view, posts.update, posts.delete
        //comments.create, comments.update, etc...
        
        Gate::before(function ($user, $ability){
            if($user->is_admin && in_array($ability, ['update'])){
                return true;
            }
        });

        /*
        Gate::after(function ($user, $ability, $result){
            if($user->is_admin){
                return true;
            }
        });*/
    }
}
