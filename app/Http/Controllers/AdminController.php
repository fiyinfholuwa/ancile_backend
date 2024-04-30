<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationNotification;
use App\Mail\ConsultationNotification;
use App\Mail\LoanNotification;
use App\Mail\CounsellorNotification;
use App\Mail\UserApplicationCounsellor;
use App\Models\ApplyCourse;
use App\Models\AskCategory;
use App\Models\AskGpt;
use App\Models\Country;
use App\Models\CourseCategory;
use App\Models\Destination;
use App\Models\EducationalLevel;
use App\Models\Blog;
use App\Models\ProgramCat;
use App\Models\AcademyTutorial;
use App\Models\EnglishTest;
use App\Models\ProgramCourse;
use App\Models\ResourceBook;
use App\Models\ResourceDownloader;
use App\Models\Ribbon;
use App\Models\Loan;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use App\Models\HomeSlider;
use App\Models\AdminRole;
use App\Models\NewApplication;
use Mail;
use App\Models\Consultation;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegisterationEmail;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\File;
use PhpOffice\PhpSpreadsheet\IOFactory;


class AdminController extends Controller
{
    public function user_view()
    {
        $users = User::where('user_type', '=', 1)->get();
        return view('backend.user_view', compact('users'));
    }

    public function user_add_view()
    {
        return view('backend.user_add');
    }

    public function admin_user_edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user_edit', compact('user'));
    }


    public function admin_user_block(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->block = $request->status;
        $user->save();
        $notification = array(
            'message' => 'User Successfully blocked',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_user_delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $notification = array(
            'message' => 'User Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function admin_user_save(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => 'required',
            'alt_phone' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
        ]);

        $min = 100000;
        $max = 999999;
        $randomNumber = rand($min, $max);
        $password = "student" . $randomNumber;
        $add_user = new User;
        $add_user->first_name = $request->first_name;
        $add_user->last_name = $request->last_name;
        $add_user->email = $request->email;
        $add_user->phone = $request->phone;
        $add_user->alt_phone = $request->alt_phone;
        $add_user->address = $request->address;
        $add_user->country = $request->country;
        $add_user->city = $request->city;
        $add_user->user_type = 1;
        $add_user->password = Hash::make($password);
        $add_user->save();

        $message = 'Dear ' . $request->first . ',' . PHP_EOL . PHP_EOL .
            'Please Find attach below to your login detail. thank you.';
        $mailData = [
            'password' => $password,
            'message' => $message,
            'email' => $request->email
        ];
        Mail::to($request->email)->send(new RegisterationEmail($mailData));
        $notification = array(
            'message' => 'User Successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_user_update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'alt_phone' => 'required',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
        ]);
        $update_user = User::findOrFail($id);
        $update_user->first_name = $request->first_name;
        $update_user->last_name = $request->last_name;
        $update_user->email = $request->email;
        $update_user->phone = $request->phone;
        $update_user->alt_phone = $request->alt_phone;
        $update_user->address = $request->address;
        $update_user->country = $request->country;
        $update_user->city = $request->city;
        $update_user->save();
        $notification = array(
            'message' => 'User Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('user.view')->with($notification);
    }

    public function consultation_all()
    {
        $consultations = Consultation::all();
        $statuses = Status::all();
        return view('backend.consultation_all', compact('consultations', 'statuses'));
    }

    public function consultation_delete($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();
        $notification = array(
            'message' => 'Consultation Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function counsellor_view()
    {
        return view('backend.counsellor_view');
    }

    public function admin_counsellor_save(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => 'required',
        ]);

        $min = 100000;
        $max = 999999;
        $randomNumber = rand($min, $max);
        $password = "counsellor" . $randomNumber;
        $add_user = new User;
        $add_user->first_name = $request->first_name;
        $add_user->last_name = $request->last_name;
        $add_user->email = $request->email;
        $add_user->phone = $request->phone;
        $add_user->user_type = 1;
        $add_user->password = Hash::make($password);
        $add_user->save();

        $message = 'Dear ' . $request->first . ',' . PHP_EOL . PHP_EOL .
            'Please Find attach below to your login detail. thank you.';
        $mailData = [
            'password' => $password,
            'message' => $message,
            'email' => $request->email
        ];
        Mail::to($request->email)->send(new RegisterationEmail($mailData));
        $notification = array(
            'message' => 'Counsellor Successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function counsellor_update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email'],
            'phone' => 'required',
        ]);

        $update_user = User::findOrFail($id);
        $update_user->first_name = $request->first_name;
        $update_user->last_name = $request->last_name;
        $update_user->email = $request->email;
        $update_user->phone = $request->phone;
        $update_user->user_type = 1;
        $update_user->save();
        $notification = array(
            'message' => 'Counsellor Successfully updated',
            'alert-type' => 'success'
        );
        return redirect()->route('counsellor.all')->with($notification);
    }

    public function admin_counsellor_block(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->block = $request->status;
        $user->save();
        $notification = array(
            'message' => 'Counsellor Successfully blocked',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_counsellor_delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $notification = array(
            'message' => 'Counsellor Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function counsellor_edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.counsellor_edit', compact('user'));
    }

    public function counsellor_all()
    {
        $users = User::where('user_type', '=', 1)->get();
        return view('backend.counsellor_all', compact('users'));
    }

    public function application_view()
    {
        $users = User::all();
        return view('backend.application_view', compact('users'));
    }

    public function application_all()
    {
        $applications = NewApplication::all();
        $counsellors = User::where('user_type', '=', 1)->get();
        $statuses = Status::all();
        return view('backend.application_all', compact('applications', 'counsellors', 'statuses'));
    }

    public function status_view()
    {
        $statuses = Status::all();
        return view('backend.status_view', compact('statuses'));
    }

    public function status_add(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $add_status = new Status;
        $add_status->name = $request->name;
        $add_status->save();
        $notification = array(
            'message' => 'Status Successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function status_delete($id)
    {

        $delete_status = Status::findOrFail($id);
        $delete_status->delete();
        $notification = array(
            'message' => 'Status Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function status_edit($id)
    {

        $status = Status::findOrFail($id);
        $statuses = Status::all();
        return view('backend.status_edit', compact('statuses', 'status'));
    }

    public function status_update(Request $request, $id)
    {
        $update_status = Status::findOrFail($id);
        $update_status->name = $request->name;
        $update_status->save();
        $notification = array(
            'message' => 'Status Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('status.view')->with($notification);
    }

    public function admin_profile_view()
    {
        return view('backend.admin_profile_view');
    }

    public function admin_profile_update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();
        $notification = array(
            'message' => 'Profile successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_password_update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = auth()->user();

        $notification = array(
            'message' => 'The current password is incorrect.',
            'alert-type' => 'error'
        );
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with($notification);
        }
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        $notification = array(
            'message' => 'Password successfully changed',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect()->route('home');
    }


    public function admin_application_save(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'dob' => 'required',
            'program' => 'required',
            'course' => 'required',
            'address' => 'required',
            'year' => 'required',
            'fund' => 'required',
            'shortlist' => 'required',
            'emergency' => 'required',
            'application_status' => 'required',
        ]);

        $randomID = rand(100000, 999999);

        $baseUrl = request()->getSchemeAndHttpHost();
        // dd("hello");
        $application = new NewApplication;

        if ($request->hasFile('undergraduate')) {
            $undergraduate = $request->file('undergraduate');
            $extension = $undergraduate->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/application/undergraduate/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $undergraduate->move($directory, $filename);
            $path_undergraduate = $baseUrl . "/" . $directory . $filename;
        } else {
            $path_undergraduate = NULL;
        }


        if ($request->hasFile('postgraduate')) {
            $postgraduate = $request->file('postgraduate');
            $extension = $postgraduate->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/application/postgraduate/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $postgraduate->move($directory, $filename);
            $path_postgraduate = $baseUrl . "/" . $directory . $filename;
        } else {
            $path_postgraduate = NULL;
        }


        if ($request->hasFile('finance')) {
            $finance = $request->file('finance');
            $extension = $finance->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/application/finance/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $finance->move($directory, $filename);
            $path_finance = $baseUrl . "/" . $directory . $filename;
        } else {
            $path_finance = NULL;
        }


        if ($request->hasFile('mark_sheet_11_12')) {
            $mark_sheet_11_12 = $request->file('mark_sheet_11_12');
            $extension = $mark_sheet_11_12->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/application/mark_sheet_11_12/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $mark_sheet_11_12->move($directory, $filename);
            $path_mark_sheet_11_12 = $baseUrl . "/" . $directory . $filename;
        } else {
            $path_mark_sheet_11_12 = NULL;
        }


        if ($request->hasFile('mark_sheet_10')) {
            $mark_sheet_10 = $request->file('mark_sheet_10');
            $extension = $mark_sheet_10->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/application/mark_sheet_10/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $mark_sheet_10->move($directory, $filename);
            $path_mark_sheet_10 = $baseUrl . "/" . $directory . $filename;
        } else {
            $path_mark_sheet_10 = NULL;
        }


        if ($request->hasFile('passport')) {
            $passport = $request->file('passport');
            $extension = $passport->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/application/passport/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $passport->move($directory, $filename);
            $path_passport = $baseUrl . "/" . $directory . $filename;
        } else {
            $path_passport = NULL;
        }

        if ($request->hasFile('attachment')) {
            $attachmentPaths = [];
            foreach ($request->file('attachment') as $attachment) {
                $extension = $attachment->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $directory = 'uploads/application/attachments/';

                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                $attachment->move($directory, $filename);
                $path_attachment = $baseUrl . "/" . $directory . $filename;

                $attachmentPaths[] = $path_attachment;
            }
        } else {
            $attachmentPaths = [];
        }

        $greOptions = $request->input('gre_option');
        $scores = $request->input('score');
        $data = [
            'gre_options' => $greOptions,
            'scores' => $scores,
            'attachments' => $attachmentPaths,
        ];
        $jsonData = json_encode($data);

        $application->full_name = $request->full_name;
        $application->email = $request->email;
        $application->mobile = $request->mobile;
        $application->gre_score = $jsonData;
        $application->fund = $request->fund;
        $application->shortlist = $request->shortlist;
        $application->emergency = $request->emergency;
        $application->application_status = $request->application_status;
        $application->undergraduate = $path_undergraduate;
        $application->postgraduate = $path_postgraduate;
        $application->mark_sheet_11_12 = $path_mark_sheet_11_12;
        $application->mark_sheet_10 = $path_mark_sheet_10;
        $application->finance = $path_finance;
        $application->passport = $path_passport;
        $application->app_uid = "ID".$randomID;
        $application->program = $request->program;
        $application->course= $request->course;
        $application->country= $request->address;
        $application->year= $request->year;
        $application->dob = $request->dob;
        $application->user_id = $request->user_id;
        $application->status = "pending";
        $application->save();
        $notification = array(
            'message' => 'Application successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function admin_application_assigned(Request $request, $id)
    {
        $app = NewApplication::findOrFail($id);
        $app->assigned_id = $request->assigned_id;
        $app->save();
        $notification = array(
            'message' => 'Counsellor successfully assigned to this application.',
            'alert-type' => 'success'
        );
        $get_counsellor_info = User::where('id', '=', $request->assigned_id)->first();
        $mailData1 = [
            'name' => $get_counsellor_info->first_name,
        ];
        Mail::to($get_counsellor_info->email)->send(new CounsellorNotification($mailData1));

        $mailData2 = [
            'name' => $app->full_name,
        ];
        Mail::to($app->email)->send(new UserApplicationCounsellor($mailData2));
        return redirect()->back()->with($notification);
    }

    public function admin_application_status(Request $request, $id)
    {
        $app = NewApplication::findOrFail($id);
        $app->status = $request->status;
        $app->save();

        $get_status = Status::where('id', '=', $request->status)->first();
        $mailData = [
            'name' => $app->full_name,
            'status' => $get_status->name,
        ];
        Mail::to($app->email)->send(new ApplicationNotification($mailData));
        $notification = array(
            'message' => 'Status successfully assigned to this application.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_application_edit($id)
    {
        $users = User::all();
        $app = NewApplication::findOrFail($id);
        return view('backend.application_edit', compact('app', 'users'));
    }

    public function admin_course_excel(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:xlsx,xls',
        ]);
        if ($request->file('csv_file')->isValid()) {
            // Get the uploaded file
            $file = $request->file('csv_file');
            $spreadsheet = IOFactory::load($file->getRealPath());
            $worksheet = $spreadsheet->getActiveSheet();
            $data = $worksheet->toArray();
            if (!empty($data[0])) {
                unset($data[0]);
            }
            foreach ($data as $row) {
                $url_slug = strtolower($row[0]);
                $label_slug = preg_replace('/\s+/', '-', $url_slug);
                $programCourse = new ProgramCourse();
                $programCourse->title = $row[0];
                $programCourse->slug = $label_slug;
                $programCourse->duration = $row[1];
                $programCourse->course_id = $row[2];
                $programCourse->level = $row[3];
                $programCourse->entry_score = $row[4];
                $programCourse->location = $row[5];
                $programCourse->intake = $row[6];
                $programCourse->fee = $row[7];
                $programCourse->university = $row[8];
                $programCourse->save();
            }
            $notification = [
                'message' => 'File Successfully Uploaded',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        } else {
            // Redirect with error message
            $notification = [
                'message' => 'Failed to upload file.',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function admin_application_review($id)
    {
        $app = NewApplication::findOrFail($id);
        return view('backend.application_view_admin', compact('app'));
    }


    public function admin_application_update(Request $request, $id)
    {

        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'dob' => 'required',
            'program' => 'required',
            'course' => 'required',
            'address' => 'required',
            'year' => 'required',
            'fund' => 'required',
            'shortlist' => 'required',
            'emergency' => 'required',
            'application_status' => 'required',
        ]);

        $randomID = rand(100000, 999999);

        $baseUrl = request()->getSchemeAndHttpHost();

        $application = NewApplication::findOrFail($id);
        if ($request->hasFile('undergraduate')) {
            $undergraduate = $request->file('undergraduate');
            $extension = $undergraduate->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/application/undergraduate/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $undergraduate->move($directory, $filename);
            $path_undergraduate = $baseUrl . "/" . $directory . $filename;
        } else {
            $path_undergraduate = $application->undergraduate;
        }


        if ($request->hasFile('postgraduate')) {
            $postgraduate = $request->file('postgraduate');
            $extension = $postgraduate->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/application/postgraduate/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $postgraduate->move($directory, $filename);
            $path_postgraduate = $baseUrl . "/" . $directory . $filename;
        } else {
            $path_postgraduate = $application->postgraduate;
        }


        if ($request->hasFile('finance')) {
            $finance = $request->file('finance');
            $extension = $finance->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/application/finance/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $finance->move($directory, $filename);
            $path_finance = $baseUrl . "/" . $directory . $filename;
        } else {
            $path_finance = $application->finance;
        }


        if ($request->hasFile('mark_sheet_11_12')) {
            $mark_sheet_11_12 = $request->file('mark_sheet_11_12');
            $extension = $mark_sheet_11_12->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/application/mark_sheet_11_12/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $mark_sheet_11_12->move($directory, $filename);
            $path_mark_sheet_11_12 = $baseUrl . "/" . $directory . $filename;
        } else {
            $path_mark_sheet_11_12 = $application->mark_sheet_11_12;
        }


        if ($request->hasFile('mark_sheet_10')) {
            $mark_sheet_10 = $request->file('mark_sheet_10');
            $extension = $mark_sheet_10->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/application/mark_sheet_10/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $mark_sheet_10->move($directory, $filename);
            $path_mark_sheet_10 = $baseUrl . "/" . $directory . $filename;
        } else {
            $path_mark_sheet_10 = $application->mark_sheet_10;
        }


        if ($request->hasFile('passport')) {
            $passport = $request->file('passport');
            $extension = $passport->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/application/passport/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $passport->move($directory, $filename);
            $path_passport = $baseUrl . "/" . $directory . $filename;
        } else {
            $path_passport = $application->passport;
        }

        if ($request->hasFile('attachment')) {
            $attachmentPaths = [];
            foreach ($request->file('attachment') as $attachment) {
                $extension = $attachment->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $directory = 'uploads/application/attachments/';

                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }

                $attachment->move($directory, $filename);
                $path_attachment = $baseUrl . "/" . $directory . $filename;

                $attachmentPaths[] = $path_attachment;
            }
        } else {
            $attachmentPaths = [];
        }

        $greOptions = $request->input('gre_option');
        $scores = $request->input('score');

        if (!empty($greOptions)){
            $data = [
                'gre_options' => $greOptions,
                'scores' => $scores,
                'attachments' => $attachmentPaths,
            ];
            $jsonData = json_encode($data);

        }else{
            $jsonData = $application->gre_score;
        }

        $application->full_name = $request->full_name;
        $application->email = $request->email;
        $application->mobile = $request->mobile;
        $application->gre_score = $jsonData;
        $application->fund = $request->fund;
        $application->shortlist = $request->shortlist;
        $application->emergency = $request->emergency;
        $application->application_status = $request->application_status;
        $application->undergraduate = $path_undergraduate;
        $application->postgraduate = $path_postgraduate;
        $application->mark_sheet_11_12 = $path_mark_sheet_11_12;
        $application->mark_sheet_10 = $path_mark_sheet_10;
        $application->finance = $path_finance;
        $application->passport = $path_passport;
        $application->program = $request->program;
        $application->course= $request->course;
        $application->country= $request->address;
        $application->year= $request->year;
        $application->dob = $request->dob;
        $application->status = "pending";
        $application->save();
        $notification = array(
            'message' => 'Application successfully updated',
            'alert-type' => 'success'
        );
        return redirect()->route('application.all')->with($notification);

    }

    public function admin_counsellor_applications($id)
    {
        $applications = NewApplication::where('assigned_id', '=', $id)->get();
        $counsellors = User::where('user_type', '=', 1)->get();
        $statuses = Status::all();
        $user = User::findorFail($id);
        return view('backend.application_counsellor', compact('applications', 'counsellors', 'statuses', 'user'));
    }

    public function admin_consultation_status(Request $request, $id)
    {
        $app = Consultation::findOrFail($id);
        $app->status = $request->status;
        $app->save();

        $get_status = Status::where('id', '=', $request->status)->first();
        $mailData = [
            'name' => $app->first_name,
            'status' => $get_status->name,
        ];
        Mail::to($app->email)->send(new ConsultationNotification($mailData));
        $notification = array(
            'message' => 'Status successfully assigned to this consultation.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function admin_application_delete($id)
    {
        $app = NewApplication::findOrFail($id);
        $app->delete();
        $notification = array(
            'message' => 'Application successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function role_view()
    {
        $roles = AdminRole::all();
        return view('backend.role_view', compact('roles'));
    }
    public function program_view()
    {
        $programs = ProgramCat::all();
        return view('backend.program_view', compact('programs'));
    }

    public function role_add(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $add_role = new AdminRole;
        $add_role->name = $request->name;
        $add_role->save();
        $notification = array(
            'message' => 'role Successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function program_add(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $baseUrl = request()->getSchemeAndHttpHost();
        $url_slug = strtolower($request->name);

        $label_slug= preg_replace('/\s+/', '-', $url_slug);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/program_category/image/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $baseUrl . "/" . $directory . $filename;
        } else {
            $path = NULL;
        }
        $program_cat = new ProgramCat();
        $program_cat->name = $request->name;
        $program_cat->slug = $label_slug;
        $program_cat->image = $path;
        $program_cat->save();
        $notification = array(
            'message' => 'Program Category Successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function program_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $program_cat = ProgramCat::findOrFail($id);
        $baseUrl = request()->getSchemeAndHttpHost();
        $url_slug = strtolower($request->name);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/program_category/image/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $baseUrl . "/" . $directory . $filename;
        } else {
            $path = $program_cat->image;
        }

        $program_cat->name = $request->name;
        $program_cat->slug = $label_slug;
        $program_cat->image = $path;
        $program_cat->save();
        $notification = array(
            'message' => 'Program Category Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('program.view')->with($notification);
    }

    public function program_delete($id)
    {

        $delete_program = ProgramCat::findOrFail($id);
        $delete_program->delete();
        $notification = array(
            'message' => 'Program Category Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function program_edit($id)
    {

        $program = ProgramCat::findOrFail($id);
        $programs = ProgramCat::all();
        return view('backend.program_edit', compact('program', 'programs'));
    }

    public function role_delete($id)
    {

        $delete_role = AdminRole::findOrFail($id);
        $delete_role->delete();
        $notification = array(
            'message' => 'Role Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function role_permission($id)
    {
        $role = AdminRole::findOrFail($id);
        return view('backend.role_permission', compact('role'));
    }

    public function role_permission_set(Request $request, $id)
    {
        $role = AdminRole::findOrFail($id);
        $role->permission = $request->permission;
        $role->save();
        $notification = array(
            'message' => 'Permission Successfully Set',
            'alert-type' => 'success'
        );
        return redirect()->route('role.view')->with($notification);
    }

    public function role_edit($id)
    {

        $role = AdminRole::findOrFail($id);
        $roles = AdminRole::all();
        return view('backend.role_edit', compact('roles', 'role'));
    }

    public function role_update(Request $request, $id)
    {
        $update_role = AdminRole::findOrFail($id);
        $update_role->name = $request->name;
        $update_role->save();
        $notification = array(
            'message' => 'Role Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('role.view')->with($notification);
    }


    public function admin_manager_view()
    {
        $roles = AdminRole::all();
        $users = User::whereNotNull('user_role')->where('user_type', 2)->get();
        return view('backend.admin_manager_view', compact('roles', 'users'));
    }

    public function admin_admin_manager_save(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => 'required',
            'user_role' => 'required',
        ]);

        $min = 100000;
        $max = 999999;
        $randomNumber = rand($min, $max);
        $password = "admin_manager" . $randomNumber;
        $add_user = new User;
        $add_user->first_name = $request->first_name;
        $add_user->last_name = $request->last_name;
        $add_user->email = $request->email;
        $add_user->phone = $request->phone;
        $add_user->user_role = $request->user_role;
        $add_user->user_type = 2;
        $add_user->password = Hash::make($password);
        $add_user->save();

        $message = 'Dear ' . $request->first . ',' . PHP_EOL . PHP_EOL .
            'Please Find attach below to your login detail. thank you.';
        $mailData = [
            'password' => $password,
            'message' => $message,
            'email' => $request->email
        ];
        Mail::to($request->email)->send(new RegisterationEmail($mailData));
        $notification = array(
            'message' => 'Admin Manager Successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function admin_manager_update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'user_role' => 'required'
        ]);

        $update_user = User::findOrFail($id);
        $update_user->first_name = $request->first_name;
        $update_user->last_name = $request->last_name;
        $update_user->email = $request->email;
        $update_user->phone = $request->phone;
        $update_user->user_type = 2;
        $update_user->user_role = $request->user_role;
        $update_user->save();
        $notification = array(
            'message' => 'Admin Manager Successfully updated',
            'alert-type' => 'success'
        );
        return redirect()->route('admin_manager.view')->with($notification);
    }

    public function admin_admin_manager_block(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->block = $request->status;
        $user->save();
        $notification = array(
            'message' => 'Admin Manager Successfully blocked',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_admin_manager_delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $notification = array(
            'message' => 'Admin Manager Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_manager_edit($id)
    {
        $user = User::findOrFail($id);
        $roles = AdminRole::all();
        $users = User::whereNotNull('user_role')->where('user_type', 2)->get();
        return view('backend.admin_manager_edit', compact('user', 'users', 'roles'));
    }

    public function admin_manager_all()
    {
        $users = User::where('user_type', '=', 1)->get();
        return view('backend.admin_manager_all', compact('users'));
    }


    public function manage_country_view()
    {
        $countries = Country::all();
        return view('backend.manage_country', compact('countries'));
    }

    public function manage_country_edit($id)
    {
        $country = Country::findOrFail($id);
        $countries = Country::all();
        return view('backend.manage_country_edit', compact('country', 'countries'));
    }

    public function manage_country_add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'flag' => 'required'
        ]);

        $baseUrl = request()->getSchemeAndHttpHost();
        $image = $request->file('flag');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/flag/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path = $baseUrl . '/'.$directory . $filename;
        $country = new Country;
        $country->name = $request->name;
        $country->flag = $path;
        $country->save();
        $notification = array(
            'message' => 'Country Successfully Added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function manage_country_delete($id)
    {
        $country = Country::findOrFail($id);
        $filePath = $country->flag;
        File::delete(public_path($filePath));
        $country->delete();
        $notification = array(
            'message' => 'Country Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function manage_country_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $baseUrl = request()->getSchemeAndHttpHost();
        $country = Country::findOrFail($id);
        if ($request->hasFile('flag')) {
            $image = $request->file('flag');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/flag/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $baseUrl.'/'. $directory . $filename;
        } else {
            $path = $country->flag;
        }

        $country->name = $request->name;
        $country->flag = $path;
        $country->save();
        $notification = array(
            'message' => 'Country Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.country.view')->with($notification);
    }

    public function admin_testimonial_view()
    {
        $countries = Country::all();
        return view('backend.testimonial_view', compact('countries'));
    }

    public function admin_testimonial_save(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'image' => 'required',
            'country' => 'required',
            'type' => 'required'
        ]);
        if ($request->type =='link' && $request->link == ""){
            $notification = array(
                'message' => 'it required that you input the link when you choose option link',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        if ($request->type =='text' && $request->body == ""){
            $notification = array(
                'message' => 'it required that you input the text when you choose option text',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $baseUrl = request()->getSchemeAndHttpHost();
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/testimonials/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path = $baseUrl.'/'.$directory . $filename;
        $testimonial = new Testimonial;
        $testimonial->full_name = $request->full_name;
        $testimonial->image = $path;
        $testimonial->link = $request->link;
        $testimonial->type = $request->type;
        $testimonial->body = $request->body;
        $testimonial->country_id = $request->country;
        $testimonial->save();
        $notification = array(
            'message' => 'Testimonial Successfully Added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_testimonial_all()
    {
        $testimonials = Testimonial::all();
        return view('backend.testimonial_all', compact('testimonials'));
    }

    public function admin_testimonial_edit($id)
    {
        $countries = Country::all();
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testimonial_edit', compact('countries', 'testimonial'));
    }


    public function admin_testimonial_update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required',
            'country' => 'required',
            'type' => 'required'
        ]);

        if ($request->type =='link' && $request->link == ""){
            $notification = array(
                'message' => 'it required that you input the link when you choose option link',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        if ($request->type =='text' && $request->body == ""){
            $notification = array(
                'message' => 'it required that you input the text when you choose option text',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $baseUrl = request()->getSchemeAndHttpHost();
        $testimonial = Testimonial::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/testimonials/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $baseUrl.'/'.$directory . $filename;
        } else {
            $path = $testimonial->image;
        }
        $testimonial->full_name = $request->full_name;
        $testimonial->image = $path;
        $testimonial->link = $request->link;
        $testimonial->type = $request->type;
        $testimonial->body = $request->body;
        $testimonial->country_id = $request->country;
        $testimonial->save();
        $notification = array(
            'message' => 'Testimonial Successfully Added',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.testimonial.all')->with($notification);
    }

    public function admin_testimonial_delete($id)
    {
        $testimony = Testimonial::findOrFail($id);
        $filePath = $testimony->image;
        File::delete(public_path($filePath));
        $testimony->delete();
        $notification = array(
            'message' => 'Testimonial Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_askgpt_view()
    {
        $askgpts = AskCategory::all();
        return view('backend.askgpt_view', compact('askgpts'));
    }

    public function admin_askgpt_edit($id)
    {
        $askgpts = AskCategory::all();
        $askgpt = AskGpt::findOrFail($id);
        return view('backend.askgpt_edit', compact('askgpts', 'askgpt'));
    }

    public function admin_askgpt_save(Request $request)
    {
        $request->validate([
            'askgpt_id' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]);
        $askgpt = new AskGpt;
        $askgpt->askgpt_id = $request->askgpt_id;
        $askgpt->question = $request->question;
        $askgpt->answer = $request->answer;
        $askgpt->save();
        $notification = array(
            'message' => 'FAQ Successfully Added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function admin_askgpt_all()
    {
        $askgpts = AskGpt::all();
        return view('backend.askgpt_all', compact('askgpts'));
    }


    public function admin_askgpt_update(Request $request, $id)
    {
        $request->validate([
            'askgpt_id' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]);
        $askgpt = AskGpt::findOrFail($id);
        $askgpt->askgpt_id = $request->askgpt_id;
        $askgpt->question = $request->question;
        $askgpt->answer = $request->answer;
        $askgpt->save();
        $notification = array(
            'message' => 'FAQ Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.askgpt.all')->with($notification);

    }

    public function admin_askgpt_delete($id)
    {
        $askgpt = AskGpt::findOrFail($id);
        $askgpt->delete();
        $notification = array(
            'message' => 'FAQ Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function admin_resource_view()
    {
        $countries = Country::all();
        return view('backend.resource_view', compact('countries'));
    }

    public function admin_resource_save(Request $request)
    {
        $baseUrl = request()->getSchemeAndHttpHost();
        $request->validate([
            'country_id' => 'required',
            'image' => 'required',
            'pdf' => 'required',
        ]);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/resources/image/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path1 = $baseUrl.'/'.$directory . $filename;
        $pdf = $request->file('pdf');
        $extension = $pdf->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/resources/pdf/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $pdf->move($directory, $filename);
        $path2 = $baseUrl.'/'.$directory . $filename;
        $resource = new ResourceBook;
        $resource->country_id = $request->country_id;
        $resource->image = $path1;
        $resource->pdf = $path2;
        $resource->save();
        $notification = array(
            'message' => 'Resource Successfully Added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_resource_all()
    {
        $resources = ResourceBook::all();
        return view('backend.resource_all', compact('resources'));
    }

    public function admin_resource_edit($id)
    {
        $countries = Country::all();
        $resource = ResourceBook::findOrFail($id);
        return view('backend.resource_edit', compact('countries', 'resource'));
    }


    public function admin_resource_update(Request $request, $id)
    {
        $baseUrl = request()->getSchemeAndHttpHost();
        $request->validate([
            'country_id' => 'required'
        ]);
        $resource = ResourceBook::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/resources/image/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path1 = $baseUrl. '/'.$directory . $filename;
        } else {
            $path1 = $resource->image;
        }
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $extension = $pdf->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/resources/pdf/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $pdf->move($directory, $filename);
            $path2 = $baseUrl. '/'.$directory . $filename;
        } else {
            $path2 = $resource->pdf;
        }

        $resource->country_id = $request->country_id;
        $resource->image = $path1;
        $resource->pdf = $path2;
        $resource->save();
        $notification = array(
            'message' => 'Resource Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.resource.all')->with($notification);
    }

    public function admin_resource_delete($id)
    {
        $resource = ResourceBook::findOrFail($id);
        $filePath1 = $resource->image;
        $filePath2 = $resource->pdf;
        File::delete(public_path($filePath1));
        File::delete(public_path($filePath2));
        $resource->delete();
        $notification = array(
            'message' => 'Resource Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_course_view()
    {
        $courses = ProgramCat::all();
        $levels = EducationalLevel::all();
        return view('backend.course_view', compact('courses', 'levels'));
    }

    public function admin_course_edit($id)
    {
        $courses = ProgramCat::all();
        $course = ProgramCourse::findOrFail($id);
        $levels = EducationalLevel::all();
        return view('backend.course_edit', compact('courses', 'course', 'levels'));
    }
    public function admin_course_review($id)
    {
        $courses = ProgramCat::all();
        $course = ProgramCourse::findOrFail($id);
        $levels = EducationalLevel::all();
        return view('backend.course_review', compact('courses', 'course', 'levels'));
    }

    public function admin_course_save(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'duration' => 'required',
            'location' => 'required',
            'intake' => 'required',
            'fee' => 'required',
            'university' => 'required',
        ]);
        $url_slug = strtolower($request->title);
        $label_slug = preg_replace('/\s+/', '-', $url_slug);
        $course = new ProgramCourse;
        $course->course_id = $request->course_id;
        $course->title = $request->title;
        $course->duration = $request->duration;
        $course->entry_score = $request->entry_score;
        $course->level = $request->level;
        $course->location = $request->location;
        $course->intake = $request->intake;
        $course->fee = $request->fee;
        $course->university = $request->university;
        $course->about = $request->about;
        $course->slug = $label_slug;
        $course->save();
        $notification = array(
            'message' => 'Course Successfully Added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_course_all()
    {
        $courses = ProgramCourse::all();
        return view('backend.course_all', compact('courses'));
    }

    public function admin_course_update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'duration' => 'required',
            'location' => 'required',
            'intake' => 'required',
            'fee' => 'required',
            'university' => 'required',
        ]);
        $url_slug = strtolower($request->title);
        $label_slug = preg_replace('/\s+/', '-', $url_slug);
        $course = ProgramCourse::findOrFail($id);
        $course->course_id = $request->course_id;
        $course->title = $request->title;
        $course->duration = $request->duration;
        $course->level = $request->level;
        $course->entry_score = $request->entry_score;
        $course->location = $request->location;
        $course->intake = $request->intake;
        $course->fee = $request->fee;
        $course->university = $request->university;
        $course->slug = $label_slug;
        $course->save();
        $notification = array(
            'message' => 'Course Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.course.all')->with($notification);
    }

    public function admin_course_delete($id)
    {
        $course = ProgramCourse::findOrFail($id);
        $course->delete();
        $notification = array(
            'message' => 'Course Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function admin_destination_view()
    {
        $countries = Country::all();
        return view('backend.destination_view', compact('countries'));
    }

    public function admin_destination_save(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'image' => 'required',
            'image2' => 'required',
            'pdf' => 'required',
        ]);
        $baseUrl = request()->getSchemeAndHttpHost();

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/destinations/image/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path1 = $baseUrl . "/" . $directory . $filename;

        $image2 = $request->file('image2');
        $extension = $image2->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/destinations/image/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image2->move($directory, $filename);
        $path11 = $baseUrl . "/" . $directory . $filename;

        $pdf = $request->file('pdf');
        $extension = $pdf->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/destinations/pdf/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $pdf->move($directory, $filename);
        $path2 = $baseUrl . "/" . $directory . $filename;
        $destination = new Destination;
        $destination->country_id = $request->country_id;
        $destination->image = $path1;
        $destination->image2 = $path11;
        $destination->pdf = $path2;
        $destination->info = $request->info;
        $destination->save();
        $notification = array(
            'message' => 'Destination Successfully Added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_destination_all()
    {
        $destinations = Destination::all();
        return view('backend.destination_all', compact('destinations'));
    }

    public function admin_destination_edit($id)
    {
        $countries = Country::all();
        $destination = Destination::findOrFail($id);
        return view('backend.destination_edit', compact('countries', 'destination'));
    }


    public function admin_destination_update(Request $request, $id)
    {
        $request->validate([
            'country_id' => 'required'
        ]);
        $baseUrl = request()->getSchemeAndHttpHost();
        $destination = Destination::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/destinations/image/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path1 = $baseUrl . "/" . $directory . $filename;
        } else {
            $path1 = $destination->image;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $extension = $image2->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/destinations/image/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image2->move($directory, $filename);
            $path11 = $baseUrl . "/" . $directory . $filename;
        } else {
            $path11 = $destination->image2;
        }
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $extension = $pdf->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/destinations/pdf/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $pdf->move($directory, $filename);
            $path2 = $baseUrl . "/" . $directory . $filename;
        } else {
            $path2 = $destination->pdf;
        }

        $destination->country_id = $request->country_id;
        $destination->image = $path1;
        $destination->image2 = $path11;
        $destination->pdf = $path2;
        $destination->info = $request->info;
        $destination->save();
        $notification = array(
            'message' => 'Destination Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.destination.all')->with($notification);
    }

    public function admin_destination_delete($id)
    {
        $destination = Destination::findOrFail($id);
        $filePath1 = ltrim(parse_url($destination->image, PHP_URL_PATH), '/');
        $filePath2 = ltrim(parse_url($destination->pdf, PHP_URL_PATH), '/');
        File::delete(public_path($filePath1));
        File::delete(public_path($filePath2));
        $destination->delete();
        $notification = array(
            'message' => 'Destination Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    public function admin_blog_view()
    {
        return view('backend.blog_view');
    }

    public function admin_blog_edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blog_edit', compact('blog'));
    }

    public function admin_blog_save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => 'required'
        ]);

        $baseUrl = request()->getSchemeAndHttpHost();
        $url_slug = strtolower($request->title);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/blog/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path = $baseUrl.'/'.$directory . $filename;
        $new_post = new Blog;
        $new_post->title = $request->title;
        $new_post->author = "Admin";
        $new_post->post_url = $label_slug;
        $new_post->post_url = $label_slug;
        $new_post->category = $request->category;
        $new_post->body = $request->body;
        $new_post->image = $path;
        $new_post->save();
        $notification = array(
            'message' => 'Post Successfully added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_blog_all()
    {
        $blogs = Blog::all();
        return view('backend.blog_all', compact('blogs'));
    }

    public function admin_blog_update(Request $request, $id)
    {
        $blog =  Blog::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => 'required'
        ]);

        $baseUrl = request()->getSchemeAndHttpHost();
        $url_slug = strtolower($request->title);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);
        if ($request->has('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/blog/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $baseUrl.'/'.$directory . $filename;
        }else{
           $path =  $blog->image;
        }

        $blog->title = $request->title;
        $blog->author = "Admin";
        $blog->post_url = $label_slug;
        $blog->category = $request->category;
        $blog->body = $request->body;
        $blog->image = $path;
        $blog->save();
        $notification = array(
            'message' => 'Post Successfully Updated',
            'alert-type' => 'success'
        );
       return redirect()->route('admin.blog.all')->with($notification);
    }

    public function admin_blog_delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        $notification = array(
            'message' => 'Post Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ribbon_view(){
        $ribbon = Ribbon::first();
        return view('backend.ribbon_view', compact('ribbon'));
    }
    public function ribbon_save(Request $request){

        if ($request->id == null){
            $ribbon =new Ribbon;
            $ribbon->body = $request->body;
            $ribbon->display = $request->display;
            $ribbon->save();
            $notification = array(
                'message' => 'Ribbon Successfully Saved',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $ribbon = Ribbon::findOrFail($request->id);
            $ribbon->body = $request->body;
            $ribbon->display = $request->display;
            $ribbon->save();
            $notification = array(
                'message' => 'Ribbon Successfully Updated',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

    }



    public function homeslider_view()
    {
        $homesliders = HomeSlider::all();
        return view('backend.homeslider_view', compact('homesliders'));
    }

    public function homeslider_add(Request $request)
    {
        $request->validate([
            'header_text' => 'required',
            'text' => 'required',
            'image' => 'required',
        ]);

        $baseUrl = request()->getSchemeAndHttpHost();

        if ($request->has('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/homeslider/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $baseUrl.'/'.$directory . $filename;
        }else{
           $path =  NULL;
        }

        $add_homeslider = new homeslider;
        $add_homeslider->header = $request->header_text;
        $add_homeslider->text = $request->text;
        $add_homeslider->image = $path;
        $add_homeslider->save();
        $notification = array(
            'message' => 'homeslider Successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function homeslider_delete($id)
    {

        $delete_homeslider = HomeSlider::findOrFail($id);
        $delete_homeslider->delete();
        $notification = array(
            'message' => 'homeslider Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function homeslider_edit($id)
    {

        $homeslider = HomeSlider::findOrFail($id);
        $homesliders = HomeSlider::all();
        return view('backend.homeslider_edit', compact('homesliders', 'homeslider'));
    }

    public function homeslider_update(Request $request, $id)
    {
        $request->validate([
            'header_text' => 'required',
            'text' => 'required',
            // 'image' => 'required',
        ]);

        $baseUrl = request()->getSchemeAndHttpHost();

        $homeslider = HomeSlider::findOrFail($id);
        if ($request->has('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/homeslider/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $baseUrl.'/'.$directory . $filename;
        }else{
           $path =  $homeslider->image;
        }


        $homeslider->header = $request->header_text;
        $homeslider->text = $request->text;
        $homeslider->image = $path;
        $homeslider->save();
        $notification = array(
            'message' => 'homeslider Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('homeslider.view')->with($notification);
    }


    public function admin_loan_all(){
        $loans = Loan::all();
        $statuses = Status::all();
        return view('backend.loan_all', compact('loans', 'statuses'));
    }

    public function loan_view($id){
        $loan = Loan::findOrFail($id);
        return view('backend.loan_view', compact('loan'));
    }


    public function consultation_view($id){
        $consultation = Consultation::findOrFail($id);
        return view('backend.consultation_view', compact('consultation'));
    }

    public function resource_download(){
        $downloads = ResourceDownloader::all();
        return view('backend.resource_download', compact('downloads'));
    }


    public function admin_english_view(){
        $tests = EnglishTest::all();
        return view('backend.english_test', compact('tests'));
    }




    public function admin_academy_view(){
        $tests = AcademyTutorial::all();
        return view('backend.academy_test', compact('tests'));
    }
    public function admin_apply_course_all(){
        $applied = ApplyCourse::all();
        $courses = ProgramCourse::all();
        return view('backend.apply_course', compact('applied', 'courses'));
    }
    public function admin_apply_course_review($id){
        $ap = ApplyCourse::findOrFail($id);
        return view('backend.applied_review', compact('ap'));
    }


    // public function resource_download(){
    //     $downloads = ResourceDownloader::all();
    //     return view('backend.resource_download', compact('downloads'));
    // }


    public function loan_delete($id)
    {

        $loan = Loan::findOrFail($id);
        $loan->delete();
        $notification = array(
            'message' => 'Loan Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function loan_status(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = $request->status;
        $loan->save();
        $mailData = [
            'name' => $loan->full_name,
            'status' => $request->status,
        ];
        Mail::to($loan->email)->send(new LoanNotification($mailData));
        $notification = array(
            'message' => 'Status successfully assigned to this loan request.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function resource_download_delete($id)
    {

        $download= ResourceDownloader::findOrFail($id);
        $download->delete();
        $notification = array(
            'message' => 'Downloader Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function admin_english_delete($id)
    {

        $test = EnglishTest::findOrFail($id);
        $test->delete();
        $notification = array(
            'message' => 'English Test Student Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function admin_academic_delete($id)
    {

        $test = AcademyTutorial::findOrFail($id);
        $test->delete();
        $notification = array(
            'message' => 'Academic Tutorial Student Successfully deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function course_delete_all(){
        ProgramCourse::truncate();
        $notification = array(
            'message' => 'All Course deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
