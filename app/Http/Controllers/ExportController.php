<?php

namespace App\Http\Controllers;

use App\Models\ProgramCourse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ExportController extends Controller
{
    public function academic_test_report(Request $request){
    ini_set('max_execution_time', 0);

    $dateFrom = Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay();
    $dateTo = Carbon::createFromFormat('Y-m-d', $request->date_to)->endOfDay();
    $type = $request->type;
     $query = DB::table('academy_tutorials')
        ->whereBetween('created_at', [$dateFrom, $dateTo]);

    if (!empty($type)) {
        $query->where('section', $type);
    }

    $data = $query->get();

    $excelContent = "SN,Phone,Email,Section,Date Created\n"; // Header row
    $i = 0;

    foreach ($data as $item) {
        $i++;
        $excelContent .= "$i,{$item->phone},{$item->email},{$item->section},{$item->created_at}\n";
    }
    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=academic_tutorial_report.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );
    return response()->stream(
        function () use ($excelContent) {
            echo $excelContent;
        },
        200,
        $headers
    );



}



public function english_test_report(Request $request){
    ini_set('max_execution_time', 0);

    $dateFrom = Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay();
    $dateTo = Carbon::createFromFormat('Y-m-d', $request->date_to)->endOfDay();
    $type = $request->type;
     $query = DB::table('english_tests')
        ->whereBetween('created_at', [$dateFrom, $dateTo]);

    if (!empty($type)) {
        $query->where('section', $type);
    }


    $data = $query->get();

    $excelContent = "SN,Phone,Email,Section,Date Created\n"; // Header row
    $i = 0;

    foreach ($data as $item) {
        $i++;
        $excelContent .= "$i,{$item->phone},{$item->email},{$item->section},{$item->created_at}\n";
    }
    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=english_test_report.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );
    return response()->stream(
        function () use ($excelContent) {
            echo $excelContent;
        },
        200,
        $headers
    );



}


public function resource_download_report(Request $request){
    ini_set('max_execution_time', 0);

    $dateFrom = Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay();
    $dateTo = Carbon::createFromFormat('Y-m-d', $request->date_to)->endOfDay();
    $type = $request->type;
     $query = DB::table('resource_downloaders')
        ->whereBetween('created_at', [$dateFrom, $dateTo]);

    if (!empty($type)) {
        $query->where('page', $type);
    }


    $data = $query->get();

    $excelContent = "SN,Phone,Email,Page,Date Created\n"; // Header row
    $i = 0;

    foreach ($data as $item) {
        $i++;
        $excelContent .= "$i,{$item->phone},{$item->email},{$item->page},{$item->created_at}\n";
    }
    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=resource_downloaders_report.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );
    return response()->stream(
        function () use ($excelContent) {
            echo $excelContent;
        },
        200,
        $headers
    );



}

public function applied_course_report(Request $request){
    ini_set('max_execution_time', 0);

    $dateFrom = Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay();
    $dateTo = Carbon::createFromFormat('Y-m-d', $request->date_to)->endOfDay();
    $type = $request->type;
     $query = DB::table('apply_courses')
        ->whereBetween('created_at', [$dateFrom, $dateTo]);

    if (!empty($type)) {
        $query->where('course_id', $type);
    }

    $data = $query->get();

    $excelContent = "SN,Phone,Email,Course Title,  Entry Score, Location,  Duration, Intake, Fee, University,Date Created\n"; // Header row
    $i = 0;

    foreach ($data as $item) {
        $i++;
        $course_info = ProgramCourse::where('id', '=', $item->course_id)->first();
        $excelContent .= "$i,{$item->phone},{$item->email},{$course_info->title}, {$course_info->entry_score}, {$course_info->location}, {$course_info->duration}, {$course_info->intake}, {$course_info->fee}, {$course_info->university},{$item->created_at}\n";
    }
    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=applied_course_report.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );
    return response()->stream(
        function () use ($excelContent) {
            echo $excelContent;
        },
        200,
        $headers
    );



}
    public function export_saved_courses(Request $request){
        ini_set('max_execution_time', 0);

        $data = ProgramCourse::all();

        $excelContent = "S/N, Course ID, Title, Education Level, Exam Score, Location, Duration, Intake, Fee, University\n"; // Header row
        $i = 0;

        foreach ($data as $item) {
            $i++;
            $excelContent .= "$i,{$item->course_id},{$item->title},{$item->level},{$item->entry_score},{$item->location},{$item->duration},{$item->intake},{$item->fee},{$item->university}\n";
        }

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=saved_program_courses.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        return response()->stream(
            function () use ($excelContent) {
                echo $excelContent;
                flush();
            },
            200,
            $headers
        );
    }

public function loan_report(Request $request){
    ini_set('max_execution_time', 0);

    $dateFrom = Carbon::createFromFormat('Y-m-d', $request->date_from)->startOfDay();
    $dateTo = Carbon::createFromFormat('Y-m-d', $request->date_to)->endOfDay();
    $type = $request->type;
     $query = DB::table('loans')
        ->whereBetween('created_at', [$dateFrom, $dateTo]);


    $data = $query->get();

    $excelContent = "SN,Full Name, Phone,Email,Program, Status,Date Created\n"; // Header row
    $i = 0;

    foreach ($data as $item) {
        $i++;
        $excelContent .= "$i,{$item->full_name} {$item->phone},{$item->email},{$item->program}, {$item->status},{$item->created_at}\n";
    }
    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=loan_report.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );
    return response()->stream(
        function () use ($excelContent) {
            echo $excelContent;
        },
        200,
        $headers
    );



}


}
