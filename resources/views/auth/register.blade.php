<x-guest-layout>
    {{-- <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card> --}}
    <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">
    
                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{asset('backend/assets/images/logo-dark.png')}}" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="{{asset('assets/images/logo-light.png')}}" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>
    
                        <div class="p-3">
                            <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                                @csrf
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <x-input id="name" class="form-control" type="text" name="name" placeholder="Name" :value="old('name')" required autofocus />
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <x-input id="email" class="form-control" type="email" name="email" placeholder="Email" :value="old('email')" required />
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <x-input id="password" class="form-control"
                                                type="password"
                                                name="password"
                                                placeholder="Password"
                                                required autocomplete="new-password" />
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <x-input id="password_confirmation" class="form-control"
                                                type="password"
                                                name="password_confirmation"
                                                placeholder="Confirm Password" required />
                                    </div>
                                </div>
    
                                {{-- <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="form-label ms-1 fw-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                        </div>
                                    </div>
                                </div> --}}
    
                                <div class="form-group text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <x-button class="btn btn-info w-100 waves-effect waves-light">
                                            {{ __('Register') }}
                                        </x-button>
                                    </div>
                                </div>
    
                                <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-3 text-center">
                                        <a href="{{route('login')}}" class="text-muted">Already have account?</a>
                                    </div>
                                </div>
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->
</x-guest-layout>
