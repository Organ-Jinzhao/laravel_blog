<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        //左侧菜单
        view()->composer('admin.layout',function($view){
            $menus = \App\Models\Permission::with([
                'childs'=>function($query){$query->with('icon');}
                ,'icon'])->where('parent_id',0)->orderBy('sort','desc')->get();
            $unreadMessage = \App\Models\Message::where('read',1)->where('accept_uuid',auth()->user()->uuid)->count();
            $view->with('menus',$menus);
            $view->with('unreadMessage',$unreadMessage);
        });

        //前台用户数据
        view()->composer('*', function ($view) {
            $user =  \App\Models\Member::select("members.*","members_info.summary","members_info.city","members_info.area")
                ->where('members.id',5)->rightJoin('members_info', 'members.id', '=', 'members_info.user_id')->first();
            $view->with('user',$user);
        });

        //前台导航公共数据
        view()->composer('home.nav', function ($view) {
            $nav = \App\Models\Nav::where('status',1)->orderBy('sort','asc')->get()->toArray();
            $view->with('nav',$nav);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
