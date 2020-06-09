<?php


namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Hod;
use App\Models\Lecturer;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use LaravelQRCode\Facades\QRCode;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('adminLogout');
    }

    public function showAdminDashboard() {
        $totalStudents = User::all()->count();
        $totalHods = Hod::all()->count();
        $totalLecturers = Lecturer::all()->count();
        $totalResults = Result::all()->count();
        $totalAdmins = Admin::all()->count();
        return view('admins.pages.home')
            ->with('total', $totalStudents)
            ->with('totalHod', $totalHods)
            ->with('totalLecturer', $totalLecturers)
            ->with('totalResult', $totalResults)
            ->with('totalAdmins', $totalAdmins);
    }

//    getStudent method is responsible for student page at admin dashboard
    public function getStudent() {
        $students = User::all();
        $totalAdmins = Admin::all()->count();
        return view('admins.pages.student', compact('students', 'totalAdmins'));
    }

//    createStudent method is responsible for creating new student page at admin dashboard
    public function createStudent(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'student_id' => 'required|unique:users|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|same:password_confirmation|min:6',
        ]);

        $student = new User();
        $student->name = $request->input('name');
        $student->student_id = $request->input('student_id');
        $student->programme = $request->input('programme');
        $student->email = $request->input('email');
        $student->password = bcrypt($request->input('password'));

        $student->save();
        $file = 'assets/img/qrcodes/' . $student->id . '.png';

        QRCode::text("".$student->student_id.", \n ".$student->name.", \n ".$student->programme.", \n ".$student->email."")
            ->setSize(8)
            ->setMargin(2)
            ->setOutfile($file)
            ->png();
        $student->qr_code = $file;
        User::where('id', $student->id)->update(['qr_code' => $student->qr_code]);
        return redirect()->back()->with('info', 'New student created successfully.');
    }

    //    updateStudent method is responsible for updating student page at admin dashboard
    public function updateStudent(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'student_id' => 'required',
            'email' => 'required',
        ]);

        $student = User::find($request->input('index_number'));
        $student->name = $request->input('name');
        $student->student_id = $request->input('student_id');
        $student->programme = $request->input('programme');
        $student->email = $request->input('email');

        $student->update();
        return redirect()->back()->with('info', 'Student records updated successfully.');
    }

    //    deleteStudent method is responsible for deleting student page at admin dashboard
    public function deleteStudent(Request $request) {
        $student = User::find($request->input('delete_id'));
        $student->delete();
        return redirect()->back()->with('info', 'Student deleted successfully.');
    }

    //    getHod method is responsible for hod page at admin dashboard
    public function getHod() {
        $hods = Hod::all();
        $totalAdmins = Admin::all()->count();
        return view('admins.pages.hod', compact('hods', 'totalAdmins'));
    }

    public function createHod(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:admins|max:100',
            'username' => 'required|unique:admins|max:100',
            'password' => 'required|same:password_confirmation|min:6',
        ]);

        $hod = new Hod();
        $hod->name = $request->input('name');
        $hod->email = $request->input('email');
        $hod->username = $request->input('username');
        $hod->password = bcrypt($request->input('password'));

        $hod->save();

        return redirect()->back()->with('info', 'New hod created successfully.');
    }

    public function updateHod(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $hod =  Hod::find($request->input('hod_id'));
        $hod->name = $request->input('name');
        $hod->email = $request->input('email');

        $hod->update();

        return redirect()->back()->with('info', 'Hod updated successfully.');
    }

    public function deleteHod(Request $request) {
        $hod =  Hod::find($request->input('delete_id'));
        $hod->delete();
        return redirect()->back()->with('info', 'Hod deleted successfully.');
    }

    //    getLecturer method is responsible for lecturer page at admin dashboard
    public function getLecturer() {
        $lecturers = Lecturer::all();
        $totalAdmins = Admin::all()->count();
       return view('admins.pages.lecturer', compact('lecturers', 'totalAdmins'));
    }

    public function createLecturer(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:admins|max:100',
            'username' => 'required|unique:admins|max:100',
            'password' => 'required|same:password_confirmation|min:6',
        ]);

        $lecturer = new Lecturer();
        $lecturer->name = $request->input('name');
        $lecturer->email = $request->input('email');
        $lecturer->username = $request->input('username');
        $lecturer->password = bcrypt($request->input('password'));

        $lecturer->save();

        return redirect()->back()->with('info', 'New lecturer created successfully.');
    }

    public function updateLecturer(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $lecturer =  Lecturer::find($request->input('lecture_id'));
        $lecturer->name = $request->input('name');
        $lecturer->email = $request->input('email');

        $lecturer->update();

        return redirect()->back()->with('info', 'Lecturer updated successfully.');
    }

    public function deleteLecturer(Request $request) {
        $lecturer =  Lecturer::find($request->input('delete_id'));
        $lecturer->delete();
        return redirect()->back()->with('info', 'Lecturer deleted successfully.');
    }

    //    getResult method is responsible for rendering/displaying result page at admin dashboard
    public function getResult() {
        $students = User::all();
        $results = Result::all();
        $totalAdmins = Admin::all()->count();
       return view('admins.pages.result', compact('students', 'results', 'totalAdmins'));
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
