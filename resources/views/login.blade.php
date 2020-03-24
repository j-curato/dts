<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="resources/js/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('style.css')}}">

</head>
<body>
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
       <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Department_of_Trade_and_Industry.png/120px-Department_of_Trade_and_Industry.png" alt="logo" align="right" />
      <div class="login d-flex align-items-center py-5">

        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Sign in</h3>
               <form action="{{url('post-login')}}" method="POST" id="logForm">

                 {{ csrf_field() }}

                 @if(Session::has('fail'))
                     <div class="alert alert-danger">
                     {{Session::get('fail')}}
                    </div>
                @endif

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


                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Login</button>
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