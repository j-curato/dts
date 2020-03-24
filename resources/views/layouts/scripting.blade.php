{{-- scripting.blade.php --}}
<!DOCTYPE html>
<html>
<head>
</head>
<body>


	<script type="text/javascript">
  $(function () {
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('parAjax.index') }}",
        columns: [
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
            // {data: 'action', name: 'action'},
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
              table.draw();
         
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
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
  });
</script>
</html>

</body>
</html>