<x-layout>

    <section>
        <div class="pt-5 pb-5">
            <div class="container-xxl">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card bg-light" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h1 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Create account</h1>

                                <form method="POST" action="/register">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="name">Name</label>
                                        <input class="form-control form-control-lg" type="text" name="name" id="name" value="{{ old('name')}}" required />
                                        @error('name')
                                        <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="username">Username</label>
                                            <input class="form-control form-control-lg" type="text" name="username" id="username" value="{{ old('username') }}" required />
                                            @error('username')
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email" id="email" value="{{ old('email') }}" required />
                                            @error('email')
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Password</label>
                                            <input class="form-control form-control-lg" name="password" type="password" id="password" required />
                                            @error('password')
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn btn-outline-success btn-lg">Register</button>
                                        </div>

                                        <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="/login" class="fw-bold text-body"><u>Login here</u></a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FORM BEFORE CHANGES  -->


    <!-- <section class="vh-100">
            <h1 class="">Register!</h1>
        
            <form class="form-outline mb-4" method="POST" action="/register">
                @csrf

                <div class="mb-6">
                    <label class=""
                        for="name">Name</label>

                    <input class="" 
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name')}}"
                        required
                        >

                    @error('name')
                        <p class="">{{ $message }}</p>
                    @enderror
                </div>
            
                <div class="mb-6">
                    <label class=""
                        for="username">Username</label>

                    <input class="" 
                        type="text"
                        name="username"
                        id="username"
                        value="{{ old('username')}}"
                        required
                        >
                    @error('username')
                        <p class="">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class=""
                        for="email">Email</label>

                    <input class="" 
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email')}}"
                        required
                        >
                    @error('email')
                        <p class="">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class=""
                        for="password">Password</label>

                    <input class="" 
                        type="password"
                        name="password"
                        id="password"
                        required
                        >
                    @error('password')
                        <p class="">{{ $message }}</p>
                    @enderror
                </div>

                <div class="">
                    <button type="submit"
                        class=""
                        >Submit</button>
                </div>
            </form>
    </section> -->


</x-layout>