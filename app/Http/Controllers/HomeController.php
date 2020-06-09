<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Result;
use App\Models\User;
use App\Models\Voucher;
use Bmatovu\MtnMomo\Products\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelQRCode\Facades\QRCode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalAdmins = Admin::all()->count();
        return view('pages.home', compact('totalAdmins'));
    }

    public function getApplyForTranscript() {
        $voucher_id = \Auth::id();
        $voucher_code = Voucher::where('code_status', 'unused')
            ->where('student_id', $voucher_id)
            ->where('status', 'SUCCESSFUL')
            ->value('voucher_code');
        return view('pages.transcript', compact('voucher_code', 'voucher_id'));
    }

    public function generateToken(Request $request) {
        $this->validate($request, [
           'phone_number' => 'required|min:10|max:12',
        ]);

        $collection = new Collection();
        $amount = 50.00;
        $momoTransactionId = $collection->transact('20200420001', '46733123454', $amount);
        if (!$momoTransactionId) {
            return redirect()->back()->with('error', 'Unable to obtain a new access token now. Try again later.');
        }
        $respondMsg = $collection->getTransactionStatus($momoTransactionId);
//        dd($respondMsg);

        $token_obj = $respondMsg['status'];
        $token_b = $respondMsg['payer'];
        $token_c = $token_b['partyId'];
        $paid_amount = $respondMsg['amount'];

        $voucher = new Voucher();
        $v_code = substr(str_shuffle("abcdefghijkmnpqrstuvwxyz1234567890"), 0, 6);
        $voucher->student_id = Auth::user()->id;
        $voucher->voucher_code = $v_code;
        $voucher->amount = $paid_amount;
        $voucher->phone_number = $request->phone_number;
        $voucher->code_status = $request->code_status;
        $voucher->transaction_number = rand(1, 10000000000);
        $voucher->xref_id = $momoTransactionId;
        $voucher->status = $token_obj;
        $voucher->save();

        return redirect()->route('checkstatus');

    }

    public function checkstatus()
    {
        $givestatus = Voucher::all()
            ->where('student_id', Auth::user()->id)
            ->where('status', 'PENDING');
        return view('pages.checkstatus', compact('givestatus'));
    }

    public function checkMe(Request $request)
    {
        $checkstatus = $request->checkstatus;

        $collection = new Collection();
        $newstatus = $collection->getTransactionStatus($checkstatus);

        $token_obj = $newstatus['status'];
        $token_b = $newstatus['payer'];
        $token_c = $token_b['partyId'];
        $paid_amount = $newstatus['amount'];

        if ($token_obj == 'SUCCESSFUL') {
            Voucher::where('status', 'PENDING')
                ->where('student_id', Auth::user()->id)
                ->update(['status' => 'SUCCESSFUL']);
            return redirect()->route('transcript')->with('info', Auth::user()->name . ' You have purchased voucher code success.
            Use the code to generate your transcript.');
        } else {
            return redirect()->back()->with('error', 'Your transaction is still pending, wait for 30secs and try again.' );
        }
    }

    public function applyForTranscript(Request $request, $id) {
        $this->validate($request, [
           'voucher_code' => 'required',
        ]);

        $voucher_code = Voucher::where('voucher_code', trim($request->voucher_code))
            ->where('code_status', 'unused')
            ->where('status', 'SUCCESSFUL')
            ->where('student_id', $id)->count();

        if ($voucher_code < 1) {
            return redirect()->back()->with('error', 'This voucher code is already in used or does not exists. Please try again.');
        }

        return redirect()->route('my-transcript', $id);
    }

    public function getTranscript($id) {
        $voucher = Voucher::where('id', $id)->get();
        $student = User::all()->where('id', $id)->first();

        $levels = Result::all();

        $year1 = Result::all()->where('student_id', $id)->where('year', 100);
        $year2 = Result::all()->where('student_id', $id)->where('year', 200);
        $year3 = Result::all()->where('student_id', $id)->where('year', 300);

//        Year One
        $total_credit_yr1_sem1 = DB::table('results')
            ->where('student_id', $id)
            ->where('year', 100)
            ->where('semester', 'One')
            ->sum('credit_hours');

        $total_credit_yr1_sem2 = DB::table('results')
            ->where('student_id', $id)
            ->where('year', 100)
            ->where('semester', 'Two')
            ->sum('credit_hours');

        //        Year Two
        $total_credit_yr2_sem1 = DB::table('results')
            ->where('student_id', $id)
            ->where('year', 200)
            ->where('semester', 'One')
            ->sum('credit_hours');

        $total_credit_yr2_sem2 = DB::table('results')
            ->where('student_id', $id)
            ->where('year', 200)
            ->where('semester', 'Two')
            ->sum('credit_hours');

        //        Year three
        $total_credit_yr3_sem1 = DB::table('results')
            ->where('student_id', $id)
            ->where('year', 300)
            ->where('semester', 'One')
            ->sum('credit_hours');

        $total_credit_yr3_sem2 = DB::table('results')
            ->where('student_id', $id)
            ->where('year', 300)
            ->where('semester', 'Two')
            ->sum('credit_hours');

        return view('pages.template', compact('voucher',
            'total_credit_yr2_sem1',
            'total_credit_yr2_sem2',
            'total_credit_yr3_sem1',
            'total_credit_yr3_sem2',
            'student',
            'year1',
            'year2',
            'year3',
            'total_credit_yr1_sem1',
            'total_credit_yr1_sem2',
            'levels'
        ));
    }

    public function printTranscript($id) {

        Voucher::where('code_status', 'unused')
            ->where('student_id', $id)
            ->update(['code_status' => 'used']);

        return redirect()->route('my-transcript', $id);
    }

    public function howToUse() {
        return view('pages.uses');
    }
}
