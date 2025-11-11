<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-body">
          <h4 class="text-center mb-4">Login</h4>

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" required autofocus>
              <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
              <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
              <label class="form-check-label" for="remember_me">Remember me</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="small">Register</a>
              @endif
              <button type="submit" class="btn btn-primary">Log in</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
