<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\MyAcademia;
use App\Models\MyBlog;
use App\Models\MyContent;
use App\Models\MyEvents;
use App\Models\Summary;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('index', function ($view) {
        $summaries = Summary::all();
        $blogs = MyBlog::orderBy('created_at', 'desc')->paginate(3);
        $events = MyEvents::orderBy('created_at', 'desc')->paginate(3);
        $academia = MyAcademia::orderBy('created_at', 'desc')->paginate(3);
        $contacts = Contact::where('type', 'official')->get();

        $view->with(compact('blogs', 'events', 'academia', 'contacts', 'summaries'));
        });

        View::composer('layouts.user-navigation', function ($view) {
            $summaries = Summary::all(); 

            $view->with(compact('summaries'));
        });
    }
}
