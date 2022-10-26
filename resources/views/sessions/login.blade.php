<x-layout>
    <section>
        <div class="pt-5 pb-5">
            <div class="container-xxl">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card bg-light" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h1 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Login</h1>

                                <form method="POST" action="/sessions">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email" id="email" value="{{ old('email')}}" required />
                                        @error('email')
                                        <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password" id="password" required />
                                        @error('password')
                                        <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <label class="form-check-label" for="signup">
                                            Don't have an account yet? <a href="/register" class="fw-bold text-body"><u>Sign up</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn btn-outline-success btn-lg">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layout>