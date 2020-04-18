<script type="text/javascript" src="{{ url('/js/sweetalert.min.js') }}"></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

<script type="text/javascript">
  $(function () {

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    var table_par = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('parAjax.index') }}",
        columns: [
            {data: 'checkbox', name: 'checkbox', orderable: false, searchable:false},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'log_ref_number', name: 'log_ref_number'},
            {data: 'date_received', name: 'date_received'},
            {data: 'type_of_transmittal', name: 'type_of_transmittal'},
            {data: 'origin', name: 'origin'},
            {data: 'subject', name: 'subject'},
            {data: 'rds_instruction', name: 'rds_instruction'},
            {data: 'route_to', name: 'route_to'},
            {data: 'date_released', name: 'date_released'},
            {data: 'year', name: 'year'},
            // {data: 'checkbox', name: 'action'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
        ]
    });
     
    $('#createNewPar').click(function () {
        $('#saveBtn').val("create-par");
        $('#par_id').val('');
        $('#parForm').trigger("reset");
        $('#modelHeading').html("Create New Par");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editPar', function () {
      var par_id = $(this).data('id');
      $.get("{{ route('parAjax.index') }}" +'/' + par_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Par");
          $('#saveBtn').val("edit-par");
          $('#ajaxModel').modal('show');
          $('#par_id').val(data.id);
          $('#log_ref_number').val(data.log_ref_number);
          $('#date_received').val(data.date_received);
          $('#type_of_transmittal').val(data.type_of_transmittal);
          $('#origin').val(data.origin);
          $('#subject').val(data.subject); 
          $('#rds_instruction').val(data.rds_instruction);
          $('#route_to').val(data.route_to);
          $('#date_released').val(data.date_released);
          $('#action').val(data.action);
          $('#year').val(data.year);
          
      });
   });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#parForm').serialize(),
          url: "{{ route('parAjax.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
           $('#parForm').trigger("reset");
          $('#ajaxModel').modal('hide');
              table_par.draw();

              swal("Data Save Successfully", "You clicked the button!", "success", {
              button: "Okay",
              });
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deletePar', function () {
     
        var par_id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('parAjax.store') }}"+'/'+par_id,
            success: function (data) {
                table_par.draw();
                alert('Daleted Successfully')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });





    // USERSIDEHERE

    
    var table = $('.datas-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('userAjax.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'fname', name: 'fname'},
            {data: 'lname', name: 'lname'},
            {data: 'username', name: 'username'},
            // {data: 'password', name: 'password'},
            {data: 'position', name: 'position'},
            {data: 'privilege', name: 'privilege'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
        ]
    });
     
    $('#createNewUser').click(function () {
        $('#saveBtns').val("create-user");
        $('#user_id').val('');
        $('#userForm').trigger("reset");
        $('#modelHeadings').html("Create New User");
        $('#ajaxModels').modal('show');
    });
    
    $('body').on('click', '.editUser', function () {
      var user_id = $(this).data('id');
      $.get("{{ route('userAjax.index') }}" +'/' + user_id +'/edit', function (data) {
          $('#modelHeadings').html("Edit Product");
          $('#saveBtns').val("edit-user");
          $('#ajaxModels').modal('show');
          $('#user_id').val(data.id);
          $('#fname').val(data.fname);
          $('#lname').val(data.lname);
          $('#username').val(data.username);
          $('#password').val(data.password);
          $('#position').val(data.position); 
          $('#privilege').val(data.privilege);
          $('#status').val(data.status);
        
      });
   });
    
    $('#saveBtns').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#userForm').serialize(),
          url: "{{ route('userAjax.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#userForm').trigger("reset");
              $('#ajaxModels').modal('hide');
              table.draw();
             swal("Data Save Successfully", "You clicked the button!", "success", {
              button: "Okay",
              });
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtns').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteUser', function () {
     
        var user_id = $(this).data("id");
        confirm("Are You sure want to delete !");
        $.ajax({
            type: "DELETE",
            url: "{{ route('userAjax.store') }}"+'/'+user_id,
            success: function (data) {
                table.draw();

                swal("Data Deleted Successfully", "You clicked the button!", "success", {
              button: "Exit",
              });
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
  });
</script>

{{-- MONTH AND YEAR --}}

<script type="text/javascript">
for(y = 2015; y <= 3000; y++) {
        var optn = document.createElement("OPTION");
        optn.text = y;
        optn.value = y;
        
        // if year is 2015 selected
        if (y ==1) {
            optn.selected = true;
        }
        
        document.getElementById('year').options.add(optn);
}
</script>

<script type="text/javascript">
var d = new Date();
var monthArray = new Array();
monthArray[0] = "January";
monthArray[1] = "February";
monthArray[2] = "March";
monthArray[3] = "April";
monthArray[4] = "May";
monthArray[5] = "June";
monthArray[6] = "July";
monthArray[7] = "August";
monthArray[8] = "September";
monthArray[9] = "October";
monthArray[10] = "November";
monthArray[11] = "December";
for(m = 0; m <= 11; m++) {
    var optn = document.createElement("OPTION");
    optn.text = monthArray[m];
    // server side month start from one
    optn.value = (m+1);
 
    // if june selected
    if ( m == -1) {
        optn.selected = true;
    }
 
    document.getElementById('month').options.add(optn);
}

</script>
</html>
     
