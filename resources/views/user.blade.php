@extends('layout')
@section('content')
 <style>
    body{
      /*https://www.dti.gov.ph/images/About/DTI-Logo.png
      https://i.ytimg.com/vi/yqXC4wlIAbI/maxresdefault.jpg*/
      background: white;
      /*background-image: url('https://www.dti.gov.ph/images/About/DTI-Logo.png');*/
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
    {{-- <a class="small" href="{{url('userAjax')}}">+ Add Catergory</a>&nbsp; --}}
    <a class="small" href="{{url('logout')}}">x Logout</a>
  </div>
  <a class="btn btn-primary" href="javascript:void(0)" id="createNewUser">Add User</a>
  <br><br>
    <table class="table table-bordered datas-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Username</th>
                <th>Position</th>
                <th>Privilege</th>
                <th>status</th>
                <th>Action</th>
           </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
<div class="modal fade" id="ajaxModels" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeadings"></h4>
            </div>
            <div class="modal-body">
                <form id="userForm" name="userForm" class="form-horizontal">
                   <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">
                        <label for="fname" class="col-sm-2 control-label">Firstname</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="fname" name="fname" 
                            placeholder="Enter Firstname" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lname" class="col-sm-2 control-label">Lastname</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="lname" name="lname" 
                            placeholder="Enter Lastname" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="username" name="username" 
                            placeholder="Enter Email" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="password" name="password" 
                            placeholder="Enter Password" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="position" class="col-sm-2 control-label">Position</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="position" name="position" 
                            placeholder="Enter Position" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="privilege" class="col-sm-2 control-label">Privilege</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="privilege" name="privilege" 
                            placeholder="Enter Privilege" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="status" name="status" 
                            placeholder="Enter Status" value="" maxlength="50" required="">
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtns" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    @endsection
    
