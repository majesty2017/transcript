<?php


namespace App\Http\Controllers;


use App\Hod;
use App\Lecturer;
use App\Result;
use App\User;
use Illuminate\Http\Request;

class LecturerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lecturer')->except('lecturerLogout');
    }

    public function showLecturerDashboard() {
        $totalStudents = User::all()->count();
        $totalHods = Hod::all()->count();
        $totalLecturers = Lecturer::all()->count();
        $totalResults = Result::all()->count();
        $students = User::all();
        $results = Result::all();
        return view('lecturers.pages.home', compact('students', 'results'))
            ->with('total', $totalStudents)
            ->with('totalHod', $totalHods)
            ->with('totalLecturer', $totalLecturers)
            ->with('totalResult', $totalResults);
    }

//    getStudent method is responsible for student page at admin dashboard
//    public function getStudent() {
//        $students = User::all();
//        return view('lecturers.pages.student', compact('students'));
//    }

    //    getResult method is responsible for rendering/displaying result page at admin dashboard
    public function getResult() {
        $students = User::all();
        $results = Result::all();
       return view('lecturers.pages.result', compact('students', 'results'));
    }

    //    postResult method is responsible for posting new results page at admin dashboard
    public function postResult(Request $request) {
        $this->validate($request, [
           'course_title' => 'required|string',
            'course_code' => 'required|string|max:15',
        ]);

        $result = new Result();
        $result->student_id = $request->input('student_id');
        $result->course_title = $request->input('course_title');
        $result->course_code = $request->input('course_code');
        $result->grade = $request->input('grade');
        $result->credit_hours = $request->input('credit_hours');
        $result->year = $request->input('year');
        $result->semester = $request->input('semester');

        $result->save();
        return redirect()->back()->with('info', 'Result posted successfully');
    }

    //    updateResult method is responsible for updating results page at admin dashboard
    public function updateResult(Request $request) {
        $this->validate($request, [
            'course_title' => 'required',
            'course_code' => 'required',
            'grade' => 'required',
            'credit_hours' => 'required',
            'year' => 'required',
            'semester' => 'required',
        ]);

        $result = Result::find($request->input('result_id'));
        $result->course_title = $request->input('course_title');
        $result->course_code = $request->input('course_code');
        $result->grade = $request->input('grade');
        $result->credit_hours = $request->input('credit_hours');
        $result->year = $request->input('year');
        $result->semester = $request->input('semester');

        $result->update();
        return redirect()->back()->with('info', 'Result updated successfully');
    }

    //    deleteResult method is responsible for deleting results page at admin dashboard
    public function deleteResult(Request $request) {
        $result = Result::find($request->input('delete_id'));
        $result->delete();
        return redirect()->back()->with('info', 'Result deleted successfully.');
    }
}
