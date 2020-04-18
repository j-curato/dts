@extends('layout')
@section('content')
<style>
    body{
      /*background-image: url('https://www.dti.gov.ph/images/About/DTI-Logo.png');*/
      /*https://www.dti.gov.ph/images/About/DTI-Logo.png
      https://i.ytimg.com/vi/yqXC4wlIAbI/maxresdefault.jpg*/
      background: white;
      background-repeat: no-repeat;
      background-size: contain;
      background-position: center;

    
    }
    .container{
    background: transparent;  
    padding: 1%;
    border-top-left-radius: 0.7rem; 
    border-top-right-radius: 0.7rem;
    border-bottom-left-radius: 0.7rem;
    border-bottom-right-radius :0.7rem;
    text-decoration-color: white;
    }
    </style>
    
    
<div class="container">
  @if(Session::has('fail'))
  <div class="alert alert-danger">
    {{Session::get('fail')}}
  </div>
  @endif
  <div align ="right">

    <a class="small" href="{{url('userAjax')}}">+ View Users</a>&nbsp;
{{--  <a class="small" href="{{url('userAjax')}}">+ Add Catergory</a>&nbsp; --}}
    <a class="small" href="{{url('logout')}}">x Logout</a>
  </div>
  <a class="btn btn-primary" href="javascript:void(0)" id="createNewPar">Add Log</a>
<a class="btn btn-warning" href="javascript:void(0)" id="createNewPar"> Edit Log</a>

 <select class="btn btn-danger" style="text-decoration-color: white" >
    <option value="">Select Department</option>
    <option>CPD</option>
    <option>IDD</option>
    <option>FAD</option>
    </select>

{{-- Month Button --}}
<select class="btn btn-info" name="month" id="month">
    <option value="">Select Month</option>
</select>
 
 {{-- Year Button --}}
<select   class="btn btn-info " style="text-decoration-color: white" name="year" id="year">
    <option value="">Select Year</option>
</select>
    <br><br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th></th>
                <th>id</th>
                <th>Log Ref #</th>
                <th>Date Received</th>
                <th>Transmittal</th>
                <th>Origin</th>
                <th>Subject</th>
                <th>Rds Insturction</th>
                <th>Route to</th>
                <th>Date Released</th>
                <th>Time Released</th>
                <th>Action</th>  
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="parForm" name="parForm" class="form-horizontal">
                   <input type="hidden" name="par_id" id="par_id">
                    <div class="form-group">
                        <label for="log_ref_number" class="col-sm-2 control-label">log_ref_number</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="log_ref_number" name="log_ref_number" 
                            placeholder="Enter log_ref_number" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date_received" class="col-sm-2 control-label">date_received</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="date_received" name="date_received" 
                            placeholder="Enter date_received" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type_of_transmittal" class="col-sm-2 control-label">type_of_transmittal</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="type_of_transmittal" name="type_of_transmittal" 
                            placeholder="Enter type_of_transmittal" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="origin" class="col-sm-2 control-label">origin</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="origin" name="origin" 
                            placeholder="Enter origin" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="col-sm-2 control-label">subject</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="subject" name="subject" 
                            placeholder="Enter subject" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rds_instruction" class="col-sm-2 control-label">rds_instruction</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="rds_instruction" name="rds_instruction" 
                            placeholder="Enter rds_instruction" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="route_to" class="col-sm-2 control-label">route_to</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="route_to" name="route_to" 
                            placeholder="Enter route_to" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date_released" class="col-sm-2 control-label">date_released</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="date_released" name="date_released" 
                            placeholder="Enter date_released" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="action" class="col-sm-2 control-label">action</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="action" name="action" 
                            placeholder="Enter action" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="year" class="col-sm-2 control-label">year</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="year" name="year" 
                            placeholder="Enter year" value="" maxlength="50" required="">
                        </div>
                    </div>
                        </div>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
