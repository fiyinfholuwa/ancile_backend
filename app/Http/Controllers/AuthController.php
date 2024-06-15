<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\ProgramCourse;
use App\Models\ResourceBook;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Models\NewApplication;
use App\Models\Consultation;


class AuthController extends Controller
{
    public function check_login(){
        if (Auth::user()->user_type=='2') {
            return redirect()->route('admin.dashboard');
        }elseif(Auth::user()->user_type=='1'){
            return redirect()->route('counsellor.dashboard');
        }elseif(Auth::user()->user_type =='0'){
            return redirect()->route('profile');
        }
        return redirect()->route('home');
    }


    public function admin_dashboard(){
        $applications = NewApplication::count();
        $applications_review = NewApplication::where('status', '!=', 'pending')->count();
        $consultations = Consultation::where('status', '=', NULL)->count();
        $total_users = User::where('user_type', '=', '0')->count();
        $total_testimonials = Testimonial::count();
        $total_resources = ResourceBook::count();
        $total_destinations = Destination::count();
        $total_courses = ProgramCourse::count();
        return view('backend.dashboard', compact('applications', 'applications_review', 'consultations', 'total_users', 'total_testimonials',  'total_users', 'total_courses', 'total_resources', 'total_destinations'));
    }

    public function counsellor_dashboard(){
        $assigned_applications = NewApplication::where('assigned_id', '=', Auth::user()->id)->count();
        return view('counsellor.dashboard', compact('assigned_applications'));
    }

}
