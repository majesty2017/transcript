$(document).ready(function () {
    $('#dataTables').DataTable({
       "pagingType": "full_numbers",
       "lengthMenu": [
           [10, 25, 50, -1],
           [10, 25, 50, "All"],
       ],
        responsive: true,
        language: {
           search: "_INPUT_",
           searchPlaceholder: "Search Records",
        },
    });

    $('.generateTokenModal').on('click', function () {
        $('#generateTokenModal').modal('show');
    });

    $('.resetPassWordModal').on('click', function () {
       $('#resetPassWordModal').modal('show');
    });

//    Admin dashboard pages
//    Student modal data handler
    $('.editStudentModal').on('click', function () {
        $('#editStudentModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('#td').map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#index_number').val(data[0]);
        $('#student').val(data[1]);
        $('#name').val(data[2]);
        $('#programme').val(data[3]);
        $('#email').val(data[4]);
    });

    $('.deleteStudentModal').on('click', function () {
        $('#deleteStudentModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('#td').map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#delete_id').val(data[0]);
    });

    //    Result modal data handler
    $('.editResultModal').on('click', function () {
        $('#editResultModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('#td').map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#result_id').val(data[0]);
        $('#courseTitle').val(data[4]);
        $('#courseCode').val(data[5]);
        $('#credit_hours').val(data[6]);
        $('#grade').val(data[7]);
        $('#year').val(data[8]);
        $('#semester').val(data[9]);
    });

    $('.deleteResultModal').on('click', function () {
        $('#deleteResultModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('#td').map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#delete_id').val(data[0]);
    });

    //    Lecturer modal data handler
    $('.editLecturerModal').on('click', function () {
        $('#editLecturerModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('#td').map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#lecture_id').val(data[0]);
        $('#lecName').val(data[1]);
        $('#lecEmail').val(data[2]);
    });

    $('.deleteLecturerModal').on('click', function () {
        $('#deleteLecturerModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('#td').map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#delete_id').val(data[0]);
    });

    //    Hod modal data handler
    $('.editHodModal').on('click', function () {
        $('#editHodModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('#td').map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#hod_id').val(data[0]);
        $('#hodName').val(data[1]);
        $('#hodEmail').val(data[2]);
    });

    $('.deleteHodModal').on('click', function () {
        $('#deleteHodModal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('#td').map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#delete_id').val(data[0]);
    });
});
