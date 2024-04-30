<?php

namespace App\Providers;
use App\Models\AdminRole;
use App\Models\AppChat;
use App\Models\Consultation;
use App\Models\Country;
use App\Models\CourseCategory;
use App\Models\Destination;
use App\Models\EducationalLevel;
use App\Models\Loan;
use App\Models\NewApplication;
use App\Models\ProgramCat;
use App\Models\Ribbon;
use Auth;

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
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('destinations', Destination::all());
            $view->with('course_cat', ProgramCat::all());
            $view->with('ribbon', Ribbon::first());
            $countries = Country::all();
            $levels = EducationalLevel::all();
            $view->with('countries', $countries);
            $view->with('levels', $levels);
            if (Auth::check()) {
                $user_role = Auth::user()->user_role;
                $permission = null;

                $unread_messages = Appchat::where('user_id', '=', Auth::user()->id)->where('counsellor_status', '=', 'pending')->get();

                $unread_messages_user = Appchat::where('user_id', '=', Auth::user()->id)->where('user_status', '=', 'pending')->get();


                if (!is_null($user_role)) {
                    $permission = AdminRole::where('id', $user_role)->first();
                    $permissions = json_decode($permission->permission, true);
                    $view->with('permissions', $permissions);
                }else{
                    $permissions = [];
                    $view->with('permissions', $permissions);
                }


                $consultations_not = Consultation::where('status', '=', NULL)->get();
                $loan_not = Loan::where('status', '=', 'pending')->get();

                $application_not = NewApplication::where('status', '=', 'pending')->get();
                $application_notification = NewApplication::where('status', '=', 'pending')->take(3)->get();

                $consultation_notification = Consultation::where('status', '=', NULL)->take(3)->get();
                $loan_notification = Loan::where('status', '=', 'pending')->take(3)->get();

                $view->with('unread_messages', $unread_messages);

                $view->with('unread_messages_user', $unread_messages_user);
                $view->with('consultations_not', $consultations_not);
                $view->with('loan_not', $loan_not);
                $view->with('application_not', $application_not);
                $view->with('consultation_notification', $consultation_notification);
                $view->with('loan_notification', $loan_notification);
                $view->with('application_notification', $application_notification);
            }
        });
    }
}
