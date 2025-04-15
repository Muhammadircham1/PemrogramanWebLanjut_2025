<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login User</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Custom Styles -->
  <style>
    body {
      background-image: url('{{ asset('image/bg.png') }}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      height:100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .login-box {
      width: 400px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
      text-align: center;
    }
    .login-logo {
      margin-bottom: 20px;
    }
    .login-logo a {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      text-decoration: none;
    }
    .login-box-msg {
      font-size: 18px;
      color: #666;
      margin-bottom: 20px;
    }
    .form-control {
      border-radius: 25px;
      padding: 10px 15px;
      border: 1px solid #ddd;
      margin-bottom: 15px;
      width: 100%;
      box-sizing: border-box;
    }
    .form-control::placeholder {
      color: #aaa;
    }
    .input-group-text {
      border-radius: 0 25px 25px 0;
      border: 1px solid #ddd;
      border-left: none;
      background: #f8f9fa;
    }
    .icheck-primary {
      text-align: left;
      margin-bottom: 15px;
    }
    .btn-primary {
      background: #a1c4fd;
      border: none;
      border-radius: 25px;
      padding: 10px;
      width: 100%;
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 15px;
    }
    .signup-link {
      font-size: 14px;
      color: #666;
    }
    .signup-link a {
      color: #007bff;
      text-decoration: none;
    }
  </style>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ url('/') }}"><b>UTS - POS</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">hi there!</p>
      <form action="{{ url('login') }}" method="POST" id="form-login">
        @csrf
        <div class="input-group mb-3">
          <input type="text" id="username" name="username" class="form-control" placeholder="Enter your Username">
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
        </div>
        <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">Remember me pleasee</label>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
      <p class="signup-link"> you're new to this? <a href="{{ url('register') }}">Sign up</a></p>
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- jquery-validation -->
  <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
  <!-- SweetAlert2 -->
  <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready(function() {
      $("#form-login").validate({
        rules: {
          username: { required: true, minlength: 4, maxlength: 20 },
          password: { required: true, minlength: 5, maxlength: 20 }
        },
        submitHandler: function(form) {
          $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            success: function(response) {
              if (response.status) {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: response.message,
                }).then(function() {
                  window.location = response.redirect;
                });
              } else {
                $('.error-text').text('');
                $.each(response.msgField, function(prefix, val) {
                  $('#error-' + prefix).text(val[0]);
                });
                Swal.fire({
                  icon: 'error',
                  title: 'Terjadi Kesalahan',
                  text: response.message
                });
              }
            }
          });
          return false;
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-group').append(error);
        },
        highlight: function(element) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
</body>
</html>