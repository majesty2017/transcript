
<html>
<head>
    <link rel="icon" href="{{ URL::to('assets/img/icon/favicon.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/sb-admin.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <script>
        $(document).ready(function () {
            $('tr').each(function () {
            var total_gpt = 0;
            $(this).find('#td').each(function () {
                var gpt = $(this).text(); //alert(gpt)

                if (gpt.length > 0) {
                   total_gpt += parseFloat(gpt); //alert(total_gpt);
                }
            });
            $(this).find("#gpt").html(total_gpt);
                console.log(total_gpt)
            });
        });
    </script>

    <style type="text/css">

        body {
            background: rgb(204,204,204);
        }
        page {
            background: white;
            display: block;
            margin: 0 auto;
            /*height: auto;*/
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
        page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
        }
        page[size="A4"][layout="portrait"] {
            width: 29.7cm;
            height: 21cm;
        }

        @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
            #printPageButton {
                display: none;
            }
        }

    </style>
</head>
<body>


{{--New Table One--}}
<page size="A4"><img src="{{ URL::to('assets/img/letterhead.jpg')}}" style="height: auto"><br><br><br>
    @if($year1)
        <div align = "center" style="font-size: 22px; font-family: calibri; font-weight: bold;">STUDENT TRANSCRIPT</div>
        <div style="margin-left: 2cm; margin-right: 2cm; font-family: calibri; ">
            <p><b>Name:</b>      {{ $student->name }}</p>
            <p><b>INDEX NO:</b>  {{ $student->student_id }}</p>
            <p><b>PROGRAMME:</b> {{ $student->programme }}</p>

            <table class="table table-borderless" id="table">
                <thead>
                <tr>
                    <td scope="col">2016/2017</td>
                    <td scope="col">FIRST SEMESTER</td>
                    <td scope="col">LEVEL: 100</td>
                </tr>
                <tr>
                    <th scope="col">CODE</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">CREDIT</th>
                    <th scope="col">GRADE</th>
                    <th scope="col">GPT</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result_yr1_sem1 = DB::select("SELECT * FROM `results` WHERE `student_id` = '".\Auth::id()."' AND `year` = 100 AND `semester` = 'One'");
                $grade_point = 0;
                foreach ($result_yr1_sem1 as $result) {

                if ($result->grade == 'A+') {
                    $grade_point = 5.0;
                } else if ($result->grade == 'A') {
                    $grade_point = 4.5;
                } else if ($result->grade == 'B+') {
                    $grade_point = 4.0;
                } else if ($result->grade == 'B') {
                    $grade_point = 3.5;
                } else if ($result->grade == 'C+') {
                    $grade_point = 3.0;
                } else if ($result->grade == 'C') {
                    $grade_point = 2.5;
                } else if ($result->grade == 'D+') {
                    $grade_point = 2.0;
                } else if ($result->grade == 'D') {
                    $grade_point = 1.5 ;
                } else if ($result->grade == 'F') {
                    $grade_point = 1.0;
                }

                if ($result->year == 100 && $result->semester == 'One') {
                $gpts = ($grade_point * $result->credit_hours);

                ?>
                <tr>
                    <th scope="row">{{ $result->course_code }}</th>
                    <td>{{ strtoupper($result->course_title) }}</td>
                    <td>{{ $result->credit_hours }}</td>
                    <td>{{ $result->grade }}</td>
                    <td id="td">{{ $grade_point * $result->credit_hours }}</td>
                </tr>

                <?php }?>
                <?php }?>
                <tr>
                    <td>
                        <p>GPA: </p>
                    </td>

                    <td>
                        <p>CGPA: </p>
                    </td>

                    <td>
                        <p>{{ $total_credit_yr1_sem1 }}</p>
                        <p>{{ $total_credit_yr1_sem1 }}</p>
                    </td>
                    <td> </td>
                    <td>
                        <p id="gpt"></p>
                        <p></p>
                    </td>
                </tr>

                </tbody>
            </table>
            <table class="table table-borderless">
                <thead>
                <tr>
                    <td scope="col">2016/2017</td>
                    <td scope="col">SECOND SEMESTER</td>
                    <td scope="col">LEVEL: 100</td>
                </tr>
                <tr>
                    <th scope="col">CODE</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">CREDIT</th>
                    <th scope="col">GRADE</th>
                    <th scope="col">GPT</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result_yr1_sem2 = DB::select("SELECT * FROM `results` WHERE `student_id` = '".\Auth::id()."' AND `year` = 100 AND `semester` = 'Two'");
                $grade_point = 0;
                foreach ($result_yr1_sem2 as $result) {

                if ($result->grade == 'A+') {
                    $grade_point = 5.0;
                } else if ($result->grade == 'A') {
                    $grade_point = 4.5;
                } else if ($result->grade == 'B+') {
                    $grade_point = 4.0;
                } else if ($result->grade == 'B') {
                    $grade_point = 3.5;
                } else if ($result->grade == 'C+') {
                    $grade_point = 3.0;
                } else if ($result->grade == 'C') {
                    $grade_point = 2.5;
                } else if ($result->grade == 'D+') {
                    $grade_point = 2.0;
                } else if ($result->grade == 'D') {
                    $grade_point = 1.5 ;
                } else if ($result->grade == 'F') {
                    $grade_point = 1.0;
                }

                if ($result->year == 100 && $result->semester == 'Two') {
                $gpts = ($grade_point * $result->credit_hours);

                ?>
                <tr>
                    <th scope="row">{{ $result->course_code }}</th>
                    <td>{{ strtoupper($result->course_title) }}</td>
                    <td>{{ $result->credit_hours }}</td>
                    <td>{{ $result->grade }}</td>
                    <td id="td">{{ $grade_point * $result->credit_hours }}</td>
                </tr>

                <?php }?>
                <?php }?>
                <tr>
                    <td>
                        <p>GPA: </p>
                    </td>

                    <td>
                        <p>CGPA: </p>
                    </td>

                    <td>
                        <p>{{ $total_credit_yr1_sem2 }}</p>
                        <p>{{ $total_credit_yr1_sem1 + $total_credit_yr1_sem2 }}</p>
                    </td>
                    <td> </td>
                    <td>
                        <p id="gpt"></p>
                        <p></p>
                    </td>
                </tr>

                </tbody>
            </table>
            <br><br>
            <br><br>

        </div>
    @endif
</page>


{{--New Table Two--}}
<page size="A4"><img src="{{ URL::to('assets/img/letterhead.jpg')}}"><br><br><br>
    @if($year2)
        <div align = "center" style="font-size: 22px; font-family: calibri; font-weight: bold;">STUDENT TRANSCRIPT</div>
        <div style="margin-left: 2cm; margin-right: 2cm; font-family: calibri; ">
            <p><b>Name:</b>      {{ $student->name }}</p>
            <p><b>INDEX NO:</b>  {{ $student->student_id }}</p>
            <p><b>PROGRAMME:</b> {{ $student->programme }}</p>

            <table class="table table-borderless" id="table">
                <thead>
                <tr>
                    <td scope="col">2016/2017</td>
                    <td scope="col">FIRST SEMESTER</td>
                    <td scope="col">LEVEL: 200</td>
                </tr>
                <tr>
                    <th scope="col">CODE</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">CREDIT</th>
                    <th scope="col">GRADE</th>
                    <th scope="col">GPT</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result_yr2_sem1 = DB::select("SELECT * FROM `results` WHERE `student_id` = '".\Auth::id()."' AND `year` = 200 AND `semester` = 'One'");
                $grade_point = 0;
                foreach ($result_yr2_sem1 as $result) {

                if ($result->grade == 'A+') {
                    $grade_point = 5.0;
                } else if ($result->grade == 'A') {
                    $grade_point = 4.5;
                } else if ($result->grade == 'B+') {
                    $grade_point = 4.0;
                } else if ($result->grade == 'B') {
                    $grade_point = 3.5;
                } else if ($result->grade == 'C+') {
                    $grade_point = 3.0;
                } else if ($result->grade == 'C') {
                    $grade_point = 2.5;
                } else if ($result->grade == 'D+') {
                    $grade_point = 2.0;
                } else if ($result->grade == 'D') {
                    $grade_point = 1.5 ;
                } else if ($result->grade == 'F') {
                    $grade_point = 1.0;
                }

                if ($result->year == 200 && $result->semester == 'One') {
                $gpts = ($grade_point * $result->credit_hours);

                ?>
                <tr>
                    <th scope="row">{{ $result->course_code }}</th>
                    <td>{{ strtoupper($result->course_title) }}</td>
                    <td>{{ $result->credit_hours }}</td>
                    <td>{{ $result->grade }}</td>
                    <td id="td">{{ $grade_point * $result->credit_hours }}</td>
                </tr>

                <?php }?>
                <?php }?>
                <tr>
                    <td>
                        <p>GPA: </p>
                    </td>

                    <td>
                        <p>CGPA: </p>
                    </td>

                    <td>
                        <p>{{ $total_credit_yr2_sem1 }}</p>
                        <p>{{ $total_credit_yr1_sem1 + $total_credit_yr1_sem2 + $total_credit_yr2_sem1 }}</p>
                    </td>
                    <td> </td>
                    <td>
                        <p id="gpt"></p>
                        <p></p>
                    </td>
                </tr>

                </tbody>
            </table>
            <table class="table table-borderless">
                <thead>
                <tr>
                    <td scope="col">2016/2017</td>
                    <td scope="col">SECOND SEMESTER</td>
                    <td scope="col">LEVEL: 200</td>
                </tr>
                <tr>
                    <th scope="col">CODE</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">CREDIT</th>
                    <th scope="col">GRADE</th>
                    <th scope="col">GPT</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result_yr2_sem2 = DB::select("SELECT * FROM `results` WHERE `student_id` = '".\Auth::id()."' AND `year` = 100 AND `semester` = 'Two'");
                $grade_point = 0;
                foreach ($result_yr2_sem2 as $result) {

                if ($result->grade == 'A+') {
                    $grade_point = 5.0;
                } else if ($result->grade == 'A') {
                    $grade_point = 4.5;
                } else if ($result->grade == 'B+') {
                    $grade_point = 4.0;
                } else if ($result->grade == 'B') {
                    $grade_point = 3.5;
                } else if ($result->grade == 'C+') {
                    $grade_point = 3.0;
                } else if ($result->grade == 'C') {
                    $grade_point = 2.5;
                } else if ($result->grade == 'D+') {
                    $grade_point = 2.0;
                } else if ($result->grade == 'D') {
                    $grade_point = 1.5 ;
                } else if ($result->grade == 'F') {
                    $grade_point = 1.0;
                }

                if ($result->year == 200 && $result->semester == 'Two') {
                $gpts = ($grade_point * $result->credit_hours);

                ?>
                <tr>
                    <th scope="row">{{ $result->course_code }}</th>
                    <td>{{ strtoupper($result->course_title) }}</td>
                    <td>{{ $result->credit_hours }}</td>
                    <td>{{ $result->grade }}</td>
                    <td id="td">{{ $grade_point * $result->credit_hours }}</td>
                </tr>

                <?php }?>
                <?php }?>
                <tr>
                    <td>
                        <p>GPA: </p>
                    </td>

                    <td>
                        <p>CGPA: </p>
                    </td>

                    <td>
                        <p>{{ $total_credit_yr2_sem2 }}</p>
                        <p>{{ $total_credit_yr1_sem1 + $total_credit_yr1_sem2 + $total_credit_yr2_sem1 + $total_credit_yr2_sem2 }}</p>
                    </td>
                    <td> </td>
                    <td>
                        <p id="gpt"></p>
                        <p></p>
                    </td>
                </tr>

                </tbody>
            </table>
            <br><br>
            <br><br>

        </div>
    @endif
</page>


{{--New Table Three--}}
<page size="A4"><img src="{{ URL::to('assets/img/letterhead.jpg')}}" style="height: auto"><br><br><br>
    @if($year3)
        <div align = "center" style="font-size: 22px; font-family: calibri; font-weight: bold;">STUDENT TRANSCRIPT</div>
        <div style="margin-left: 2cm; margin-right: 2cm; font-family: calibri; ">
            <p><b>Name:</b>      {{ $student->name }}</p>
            <p><b>INDEX NO:</b>  {{ $student->student_id }}</p>
            <p><b>PROGRAMME:</b> {{ $student->programme }}</p>

            <table class="table table-borderless" id="table">
                <thead>
                <tr>
                    <td scope="col">2016/2017</td>
                    <td scope="col">FIRST SEMESTER</td>
                    <td scope="col">LEVEL: 300</td>
                </tr>
                <tr>
                    <th scope="col">CODE</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">CREDIT</th>
                    <th scope="col">GRADE</th>
                    <th scope="col">GPT</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result_yr3_sem1 = DB::select("SELECT * FROM `results` WHERE `student_id` = '".\Auth::id()."' AND `year` = 300 AND `semester` = 'One'");
                $grade_point = 0;
                foreach ($result_yr3_sem1 as $result) {

                if ($result->grade == 'A+') {
                    $grade_point = 5.0;
                } else if ($result->grade == 'A') {
                    $grade_point = 4.5;
                } else if ($result->grade == 'B+') {
                    $grade_point = 4.0;
                } else if ($result->grade == 'B') {
                    $grade_point = 3.5;
                } else if ($result->grade == 'C+') {
                    $grade_point = 3.0;
                } else if ($result->grade == 'C') {
                    $grade_point = 2.5;
                } else if ($result->grade == 'D+') {
                    $grade_point = 2.0;
                } else if ($result->grade == 'D') {
                    $grade_point = 1.5 ;
                } else if ($result->grade == 'F') {
                    $grade_point = 1.0;
                }

                if ($result->year == 300 && $result->semester == 'One') {
                $gpts = ($grade_point * $result->credit_hours);

                ?>
                <tr>
                    <th scope="row">{{ $result->course_code }}</th>
                    <td>{{ strtoupper($result->course_title) }}</td>
                    <td>{{ $result->credit_hours }}</td>
                    <td>{{ $result->grade }}</td>
                    <td id="td">{{ $grade_point * $result->credit_hours }}</td>
                </tr>

                <?php }?>
                <?php }?>
                <tr>
                    <td>
                        <p>GPA: </p>
                    </td>

                    <td>
                        <p>CGPA: </p>
                    </td>

                    <td>
                        <p>{{ $total_credit_yr3_sem1 }}</p>
                        <p>{{ $total_credit_yr1_sem1 + $total_credit_yr1_sem2 + $total_credit_yr2_sem1 + $total_credit_yr2_sem2 + $total_credit_yr3_sem1}}</p>
                    </td>
                    <td> </td>
                    <td>
                        <p id="gpt"></p>
                        <p></p>
                    </td>
                </tr>

                </tbody>
            </table>
            <table class="table table-borderless">
                <thead>
                <tr>
                    <td scope="col">2016/2017</td>
                    <td scope="col">SECOND SEMESTER</td>
                    <td scope="col">LEVEL: 300</td>
                </tr>
                <tr>
                    <th scope="col">CODE</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">CREDIT</th>
                    <th scope="col">GRADE</th>
                    <th scope="col">GPT</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $result_yr3_sem2 = DB::select("SELECT * FROM `results` WHERE `student_id` = '".\Auth::id()."' AND `year` = 300 AND `semester` = 'Two'");
                $grade_point = 0;
                foreach ($result_yr3_sem2 as $result) {

                if ($result->grade == 'A+') {
                    $grade_point = 5.0;
                } else if ($result->grade == 'A') {
                    $grade_point = 4.5;
                } else if ($result->grade == 'B+') {
                    $grade_point = 4.0;
                } else if ($result->grade == 'B') {
                    $grade_point = 3.5;
                } else if ($result->grade == 'C+') {
                    $grade_point = 3.0;
                } else if ($result->grade == 'C') {
                    $grade_point = 2.5;
                } else if ($result->grade == 'D+') {
                    $grade_point = 2.0;
                } else if ($result->grade == 'D') {
                    $grade_point = 1.5 ;
                } else if ($result->grade == 'F') {
                    $grade_point = 1.0;
                }

                if ($result->year == 300 && $result->semester == 'Two') {
                $gpts = ($grade_point * $result->credit_hours);

                ?>
                <tr>
                    <th scope="row">{{ $result->course_code }}</th>
                    <td>{{ strtoupper($result->course_title) }}</td>
                    <td>{{ $result->credit_hours }}</td>
                    <td>{{ $result->grade }}</td>
                    <td id="td">{{ $grade_point * $result->credit_hours }}</td>
                </tr>

                <?php }?>
                <?php }?>
                <tr>
                    <td>
                        <p>GPA: </p>
                    </td>

                    <td>
                        <p>CGPA: </p>
                    </td>

                    <td>
                        <p>{{ $total_credit_yr3_sem2 }}</p>
                        <p>{{ $total_credit_yr1_sem1 + $total_credit_yr1_sem2 + $total_credit_yr2_sem1 + $total_credit_yr2_sem2 + $total_credit_yr3_sem1 + $total_credit_yr3_sem2 }}</p>
                    </td>
                    <td> </td>
                    <td>
                        <p id="gpt"></p>
                        <p></p>
                    </td>
                </tr>

                </tbody>
            </table>
            <form action="{{ route('print', [$student->id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary" id="printPageButton" onClick="window.print();">Print Transcript</button>
            </form>
        </div>
    @endif
</page>

<script>

    function generatePDF(){
        var conv = new ActiveObject("pdfServMachine.converter");
        conv.convert("http://www.google.com", 'c:\\google.com', false);
        WScript.Echo("finished conversion");
    }
</script>
</body>
</html>
