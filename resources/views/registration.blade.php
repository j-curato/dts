<!DOCTYPE html>
<html>
<head>
<title>DTS-Registration</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('style.css')}}">

</head>
<body>
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Register here!</h3>
               <form action="{{url('post-registration')}}" method="POST" id="regForm">
                 {{ csrf_field() }}
                <div class="form-label-group">
                  <input type="text" id="inputName" name="fname" class="form-control" placeholder="Firstname" autofocus>
                  <label for="inputName"> First Name</label>

                  @if ($errors->has('fname'))
                  <span class="error">{{ $errors->first('fname') }}</span>
                  @endif      
                </div> 

                <div class="form-label-group">
                  <input type="text" id="inputName" name="lname" class="form-control" placeholder="Lastname" autofocus>
                  <label for="inputName"> Last Name</label>

                  @if ($errors->has('lname'))
                  <span class="error">{{ $errors->first('lname') }}</span>
                  @endif       

                </div> 



                <div class="form-label-group">
                  <input type="email" name="username" id="inputEmail" class="form-control" placeholder="Email address" >
                  <label for="inputEmail">Email address</label>

                  @if ($errors->has('username'))
                  <span class="error">{{ $errors->first('username') }}</span>
                  @endif    
                </div> 

                <div class="form-label-group">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                  <label for="inputPassword">Password</label>
                  
                  @if ($errors->has('password'))
                  <span class="error">{{ $errors->first('password') }}</span>
                  @endif  
                </div>

                <div class="form-label-group">
                  <input type="text" id="inputName" name="position" class="form-control" placeholder="Position" autofocus>
                  <label for="inputName"> Position</label>

                  @if ($errors->has('position'))
                  <span class="error">{{ $errors->first('position') }}</span>
                  @endif      
                </div> 

                <div class="form-label-group">
                  <input type="text" id="inputName" name="privilege" class="form-control" placeholder="Privilege" autofocus>
                  <label for="inputName"> Privilege</label>

                  @if ($errors->has('privilege'))
                  <span class="error">{{ $errors->first('privilege') }}</span>
                  @endif      
                </div> 

                <div class="form-label-group">
                  <input type="text" id="inputName" name="status" class="form-control" placeholder="Status" autofocus>
                  <label for="inputName"> Status</label>

                  @if ($errors->has('status'))
                  <span class="error">{{ $errors->first('status') }}</span>
                  @endif      
                </div> 

                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign Up</button>
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>