<!doctype html>
<html lang="en" dir="ltr">
  <head>
      <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/css/tabler.min.css" />
<script
  src="https://cdn.jsdelivr.net/npm/@tabler/core@1.2.0/dist/js/tabler.min.js">
</script>
@vite('resources/js/admin/login.js');
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-login mx-auto mt-6">
              <div class="text-center mb-6">
                <x-auth-session-status class="mb-4" :status="session('status')" />
              </div>
              <form class="card" action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="card-body p-6">
                  <div class="card-title text-center">Admin - Login to your account</div>
                  <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                     <x-input-error :messages="$errors->get('email')" style="color: red" class="mt-2" />
                  </div>
                  <br>
                  <div class="form-group">
                    <label class="form-label">
                      Password
                      <a href="{{ route('admin.password.request') }}" class="small" style="float: right">I forgot password</a>
                    </label>
                     <div class="input-group input-group-flat">
                    <input type="password" name="password" class="form-control" id="show-password" placeholder="Password">
                      <span class="input-group-text">
                    <a href="javascript:void(0);" class="link-secondary show-password" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg></a>
                  </span>
                     </div>
                    <x-input-error :messages="$errors->get('password')" style="color: red" class="mt-2" />
                  </div>

              
                  <br>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="remember" id="remember_me" />
                      <span class="custom-control-label">Remember me</span>
                    </label>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>