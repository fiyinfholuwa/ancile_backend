<?php

namespace App\Http\Controllers;

use App\Models\AppChat;
use App\Models\NewApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\ApplicationNotification;

class UserController extends Controller
{
    public function profile(){
        $applications = NewApplication::where('user_id', '=', Auth::user()->id)->get();
        $completed_applications = NewApplication::where('user_id', '=', Auth::user()->id)->where('status','=', 5)->get();
        $canceled_applications = NewApplication::where('user_id', '=', Auth::user()->id)->where('status', '=', 6)->get();
        return view('frontend.profile', compact('applications', 'completed_applications', 'canceled_applications'));
    }

    public function user_profile(Request $request){
        $baseUrl = request()->getSchemeAndHttpHost();
        $userid = $request->input('userid');
        $user = User::findOrFail($userid);
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'mobileNumber' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/user/image/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $baseUrl . '/'.$directory . $filename;

        }else{
            $path = NULL;
        }
        $user->first_name = $request->input('firstName');
        $user->last_name = $request->input('lastName');
        $user->phone = $request->input('mobileNumber');
        $user->image = $path;
        $user->save();
        return response()->json(['message' => 'Profile updated successfully']);
    }
    public function user_application(){

        return view('frontend.application');
    }

    public function user_track($id){
        $application = NewApplication::findOrFail($id);
        return view('frontend.track', compact('application'));
    }
    public function user_chat($id){
        $chats = AppChat::where('app_id', '=', $id)->get();
        $application = NewApplication::findOrFail($id);
        return view('frontend.chat', compact('application', 'chats'));
    }

    public function user_application_save(Request $request){
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
        $application->user_id = Auth::user()->id;
        $application->status = "pending";
        $application->save();
        $mailData = [
            'name' => $request->full_name,
            'status' => "welcome",
        ];
        Mail::to($request->email)->send(new ApplicationNotification($mailData));
        $notification = array(
            'message' => 'Application successfully saved',
            'alert-type' => 'success'
        );
        return redirect()->route('profile')->with($notification);

    }


    public function user_chat_add(Request $request){
        $chat = new AppChat;

        $baseUrl = request()->getSchemeAndHttpHost();
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $extension = $pdf->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/chat/pdf/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $pdf->move($directory, $filename);
            $path = $baseUrl . "/" . $directory . $filename;
        } else {
            $path =NULL;

        }
        $chat->app_id = $request->app_id;
        $chat->message = $request->message;
        $chat->user_type ="user";
        $chat->user_id = Auth::user()->id;
        $chat->pdf = $path;
        $chat->user_status= "read";
        $chat->save();
        $notification = array(
            'message' => 'Message Sent',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function user_application_edit($id){
        $application = NewApplication::findOrFail($id);
        return view('frontend.application_edit', compact('application'));
    }

    public function user_application_update(Request $request, $id){

//        dd("hello");
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
        $application->user_id = Auth::user()->id;
        $application->status = "pending";
        $application->save();
        $notification = array(
            'message' => 'Application successfully updated',
            'alert-type' => 'success'
        );
        return redirect()->route('profile')->with($notification);
    }


}
