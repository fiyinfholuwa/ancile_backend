<?php

namespace App\Http\Controllers;


use App\Mail\ApplicationNotification;
use App\Mail\ConsultationNotification;
use App\Mail\ConsultNotification;
use App\Mail\TutorialEMail;
use App\Models\ApplyCourse;
use App\Models\AskCategory;
use App\Models\AskGpt;
use App\Models\Blog;
use App\Models\Consultation;
use App\Models\Contact;
use App\Models\Country;
use App\Models\CourseCategory;
use App\Models\Destination;
use App\Models\ProgramCat;
use App\Models\ProgramCourse;
use App\Models\AcademyTutorial;
use App\Models\EnglishTest;
use App\Models\ResourceBook;
use App\Models\Loan;
use App\Models\Testimonial;
use App\Models\ResourceDownloader;
use App\Models\EducationalLevel;
use Illuminate\Http\Request;
use App\Models\HomeSlider;
use Mail;
use App\Mail\LoanNotification;


class FrontendController extends Controller
{
    public function home(){

        $homesliders = HomeSlider::paginate(3);
        $testimonials = Testimonial::where('type', '=', 'link')->paginate(3);
        $testimonials_text = Testimonial::where('type', '=', 'text')->paginate(3);
        $course_category = CourseCategory::all();
        $destinationss = Destination::take(4)->get();
        return view('frontend.home', compact('course_category', 'testimonials','destinationss', 'testimonials_text', 'homesliders'));
    }
    public function courses(){
        $levels = EducationalLevel::all();
        $course_category = ProgramCat::all();
        return view('frontend.course', compact('course_category', 'levels'));
    }
    public function courses_category($name){
        $levels = EducationalLevel::all();
        $course_info = ProgramCat::where('slug', '=', $name)->first();
        $courses = ProgramCourse::where('course_id', '=', $course_info->id)->paginate(4);
        $course_category = ProgramCat::all();
        return view('frontend.course_cat', compact('courses', 'levels', 'course_category'));
    }
    public function courses_detail($title){
        $course = ProgramCourse::where('slug', '=', $title)->first();
        return view('frontend.course_detail', compact('course'));
    }
    public function blog_detail($title){
        $blog = Blog::where('post_url', '=', $title)->first();
        $next_blog = Blog::where('id', '>', $blog->id)->first();
        return view('frontend.blog_detail', compact('blog', 'next_blog'));
    }
    public function news_detail($title){
        $blog = Blog::where('post_url', '=', $title)->first();
        $next_blog = Blog::where('id', '>', $blog->id)->first();
        return view('frontend.news_detail', compact('blog', 'next_blog'));
    }
    public function resources(){
        $resources = ResourceBook::all();
        return view('frontend.resources', compact('resources'));
    }
    public function blog(){
        $blogs = Blog::where('category', '=', 'blog')->paginate(6);
        return view('frontend.blog', compact('blogs'));
    }
    public function contact(){
        return view('frontend.contact');
    }

    public function contact_save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
//            'subject' => 'required',
            'message' => 'required',
        ]);

        $attendance = new Contact;
        $attendance->name = $request->name;
        $attendance->email = $request->email;
        $attendance->phone = $request->phone;
//        $attendance->subject = $request->subject;
        $attendance->message= $request->message;
        $attendance->save();
        $notification = array(
            'message' => 'Message sent Successfully, we will get back to you shortly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function news(){
        $blogs = Blog::where('category', '=', 'news')->paginate(6);
        return view('frontend.new', compact('blogs'));
    }

    public function faq(){
        $category = AskCategory::all();
        return view('frontend.faq', compact('category'));
    }
    public function faq_category_d($ask_name){
        $ask_info = AskCategory::where('ask_code', '=', $ask_name)->first();
        $asks = AskGpt::where('askgpt_id', '=', $ask_info->id)->get();
        return view('frontend.faq_result', compact('asks', 'ask_info'));
    }
    public function about(){
        return view('frontend.about');
    }
    public function consultation(){
        return view('frontend.consultation');
    }

    public function auth_login(){
        return view('frontend.login');
    }
    public function auth_register(){
        return view('frontend.register');
    }

    public function consultation_add(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email'],
            'phone' => 'required',
            'country' => 'required',
            'education_level' => 'required',
        ]);
        $consultation = new Consultation;
        $consultation->first_name = $request->first_name;
        $consultation->last_name = $request->last_name;
        $consultation->email = $request->email;
        $consultation->phone = $request->phone;
        $consultation->country = $request->country;
        $consultation->education_level = $request->education_level;
        $consultation->save();
        $mailData = [
            'name' => $request->first_name,
            'status' => "welcome",
        ];
        Mail::to($request->email)->send(new ApplicationNotification($mailData));

        $mailData1 = [
            'name' => 'AncileAcademy',
            'status' => 'pending'
        ];
        Mail::to("hello@ancileacademy.com")->send(new ConsultNotification($mailData1));
        return response()->json([
            'message' => 'Consultation request successfully sent, we will get back to you shortly',
        ]);
    }

    public function destination_detail($id){
        $country = Country::where('name', '=', $id)->first();
        $destination = Destination::where('country_id', '=', $country->id)->first();
        return view('frontend.destination_detail', compact('destination'));
    }


    public function courses_general_search(Request $request){
        $category = $request->input('category');
        $country = $request->input('country');
//        $level_id = EducationalLevel::findOrFail($levelCode);
//        $levels = EducationalLevel::all();
        $course_category = ProgramCat::all();
        $searchQuery = $request->input('search');
        $courses = ProgramCourse::where('title', 'like', '%' . $searchQuery . '%')
            ->where('course_id', 'like', '%' . $category . '%')
            ->where('location', 'like', '%' . $country . '%')
            ->paginate(4);
        return view('frontend.course_search_general', compact('courses', 'searchQuery', 'course_category'));
    }
    public function blog_search(Request $request){
        $searchQuery = $request->input('search');
        $blogs = Blog::where('title', 'like', '%' . $searchQuery . '%')->paginate(6);
        return view('frontend.blog_search', compact('blogs', 'searchQuery'));
    }
    public function news_search(Request $request){
        $searchQuery = $request->input('search');
        $blogs = Blog::where('title', 'like', '%' . $searchQuery . '%')->paginate(6);
        return view('frontend.news_search', compact('blogs', 'searchQuery'));
    }
    public function ask_general_search(Request $request){
        $searchQuery = $request->input('search');
        $asks = AskGpt::where('question', 'like', '%' . $searchQuery . '%')
            ->get();
        $category = AskCategory::all();
        return view('frontend.ask_general_search', compact('asks', 'searchQuery', 'category', 'searchQuery'));
    }

    public function resource_download(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email'],
            'phone' => 'required',
        ]);
        $check_if_exist = ResourceDownloader::where('email', '=', $request->email)->orWhere('phone', '=', $request->phone)->first();
        if($check_if_exist){
            return response()->json(['message' => 'you have already have detail with us, click ok, while your resource will be downloaded automatically'], 200);
        }
        $res_download = new ResourceDownloader;
        $res_download->email = $request->email;
        $res_download->phone = $request->phone;
        $res_download->page = $request->page;
        $res_download->save();
        return response()->json(['message' => 'submitted successfully, click ok, while your resource will be downloaded automatically'], 200);
    }

    public function study_loan(){
        return view('frontend.loan');
    }

    public function loan_save(Request $request){
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'program' => 'required',
        ]);
        $loan = new Loan;
        $loan->full_name = $request->full_name;
        $loan->email = $request->email;
        $loan->phone = $request->mobile;
        $loan->program = $request->program;
        $loan->status = "pending";
        $loan->save();
        $mailData = [
            'name' => $loan->full_name,
            'status' => "welcome",
        ];
        Mail::to($loan->email)->send(new LoanNotification($mailData));
        $mailData1 = [
            'name' => 'AncileAcademy',
            'status' => 'admin'
        ];
        Mail::to("hello@ancileacademy.com")->send(new LoanNotification($mailData1));
        $notification = array(
            'message' => 'loan successfully submitted, we will get back to you shortly.',
            'alert-type' => 'success'
        );
        return redirect()->route('home')->with($notification);

    }

    public function user_english_test(){
        return view('frontend.english');
    }

    public function user_academic_test(){
        return view('frontend.academy');
    }


    public function academic_tutorial(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email'],
            'phone' => 'required',
        ]);
        $check_if_exist = AcademyTutorial::where('email', '=', $request->email)->Where('phone', '=', $request->phone)->Where('section', '=', $request->section)->first();
        if($check_if_exist){
            return response()->json(['message' => 'you have already have detail with us, we will get back to you shortly'], 200);
        }
        $res = new AcademyTutorial;
        $res->email = $request->email;
        $res->phone = $request->phone;
        $res->section = strtolower($request->section);
        $res->save();
        $mailData = [
            'name' => $request->email,
        ];
        Mail::to($request->email)->send(new TutorialEMail($mailData));
        return response()->json(['message' => 'submitted successfully, thank you registering, we will get back to you shortly.'], 200);
    }


    public function english_tutorial(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email'],
            'phone' => 'required',
        ]);
        $check_if_exist = EnglishTest::where('email', '=', $request->email)->Where('phone', '=', $request->phone)->Where('section', '=', $request->section)->first();
        if($check_if_exist){
            return response()->json(['message' => 'you have already have detail with us, we will get back to you shortly'], 200);
        }
        $res = new EnglishTest;
        $res->email = $request->email;
        $res->phone = $request->phone;
        $res->section = strtolower($request->section);
        $res->save();
        $mailData = [
            'name' => $request->email,
        ];
        Mail::to($request->email)->send(new TutorialEMail($mailData));
        return response()->json(['message' => 'submitted successfully, thank you registering, we will get back to you shortly.'], 200);
    }
    public function apply_course(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email'],
            'phone' => 'required',
        ]);
        $check_if_exist = ApplyCourse::where('email', '=', $request->email)->Where('phone', '=', $request->phone)->Where('course_id', '=', $request->course_id)->first();
        if($check_if_exist){
            return response()->json(['message' => 'you have already have detail with us, we will get back to you shortly'], 200);
        }
        $res = new ApplyCourse();
        $res->email = $request->email;
        $res->phone = $request->phone;
        $res->course_id = $request->course_id;
        $res->save();
        $mailData = [
            'name' => $request->email,
        ];
        Mail::to($request->email)->send(new TutorialEMail($mailData));
        return response()->json(['message' => 'submitted successfully, thank you registering, we will get back to you shortly.'], 200);
    }
}
