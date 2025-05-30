@extends(theme('auth.layouts.app1'))
@section('content')
 <link href="https://fonts.googleapis.com/css2?family=Saira&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
    header {
      height: 80px;
      width: 100%;
      background-color: #00053d;

      @media screen and (max-width: 768px) {
        height: 60px;
      }

      .header-logo {
        width: 100px;
        left: 10%;

        @media screen and (max-width: 768px) {
          width: 60px;
        }
      }
    }
    section {
      width: 100%;
      background-color: #001b73;
    }

    footer {
            height: 200px;
            width: 100%;
            background-color: #00053d;
            padding-left: 11%;
            padding-top: 50px;
        
            @media screen and (max-width: 768px) {
                height: 150px;
                padding-top: 5px;
            }

      .footer-logo {
        width: 30px;

        @media screen and (max-width: 768px) {
          width: 20px;
        }
      }
    }
.f-bottom{
        gap: 8.5rem;
         @media screen and (max-width: 768px) {
                gap: 1.5rem;

            }

       }
         .privacy{
    text-decoration: underline !important; 
  }
    .text-normal {
      font-size: medium;
       font-family: 'Roboto', sans-serif;
       text-decoration: underline;

      @media screen and (max-width: 768px) {
        font-size: small;
         font-family: 'Roboto', sans-serif;
         text-decoration: underline;
      }
    }

    .text-company {
      font-size: x-large;
       font-family: 'Roboto', sans-serif;
           font-size: 30px;

      @media screen and (max-width: 768px) {
        font-size: large;
         font-family: 'Roboto', sans-serif;
      }
    }

    .login-card {
      background-color: white;
    }
  </style>
<!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.oncontextmenu = null;

            document.addEventListener('contextmenu', function(event) {
                event.stopPropagation(); // Just in case something else tries to block it
            }, true);
        });
    </script> -->
  <div class="d-flex flex-column justify-content-center align-items-center vh-100">
    <header class="position-relative">
      <img src="{{ asset(Settings('logo')) }} " alt="Logo" class="header-logo position-absolute top-100 translate-middle-y">
    </header>
    <section class="flex-grow-1 d-flex justify-content-center align-items-center">
      <div class="login-card">
        <div class="p-4 login_wrapper_content">
          
           <h4 class="text-center">Reset Email</h4>
          <div class="socail_links">
            @if (saasEnv('ALLOW_FACEBOOK_LOGIN') == 'true')
                <a href="{{ route('social.oauth', 'facebook') }}"
                                        class="theme_btn small_btn2 text-center facebookLoginBtn">
                    <i class="fab fa-facebook-f"></i>
                    {{ __('frontend.Login with Facebook') }}</a>
             @endif

            @if (saasEnv('ALLOW_GOOGLE_LOGIN') == 'true')
                <a href="{{ route('social.oauth', 'google') }}"
                                        class="theme_btn small_btn2 text-center googleLoginBtn">
                    <i class="fab fa-google"></i>
                    {{ __('frontend.Login with Google') }}</a>
            @endif
        </div>
        @if (saasEnv('ALLOW_FACEBOOK_LOGIN') == 'true' || saasEnv('ALLOW_GOOGLE_LOGIN') == 'true')
            <p class="login_text">{{ __('frontend.Or') }} {{ __('frontend.login with Email Address') }}
            </p>
         @endif
          <form action="{{route('password.email')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 input-group custom-input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">
                                        <!-- svg -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                             viewBox="0 0 13.328 10.662">
                                            <path id="Path_44" data-name="Path 44"
                                                  d="M13.995,4H3.333A1.331,1.331,0,0,0,2.007,5.333l-.007,8a1.337,1.337,0,0,0,1.333,1.333H13.995a1.337,1.337,0,0,0,1.333-1.333v-8A1.337,1.337,0,0,0,13.995,4Zm0,9.329H3.333V6.666L8.664,10l5.331-3.332ZM8.664,8.665,3.333,5.333H13.995Z"
                                                  transform="translate(-2 -4)" fill="#687083"/>
                                        </svg>
                                        <!-- svg -->
                                    </span>
                                </div>
                                <input type="email" value="{{old('email')}}"
                                       class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       placeholder="{{__('common.Enter Email')}}" name="email" aria-label="Username"
                                       aria-describedby="basic-addon3">
                            </div>

                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 btn-login mt-2 theme_btn text-center w-100">
                                {{__('common.Send Reset Link')}}
                            </button>
                        </div>
                    </div>
                </form>
                <h5 class="shitch_text mb-0 mt-2 text-center">

                {{__('common.Need an account?')}}<a style="color: rgb(13 110 253)" href="{{route('register')}}">  {{__('common.Register')}}</a>

               </h5>

        </div>
      </div>
    </section>
    <footer class="py-5 d-flex flex-column gap-2">
      <span class="text-white text-normal">Powered By</span>
      <div class="d-flex align-items-center gap-2">
        <img src="{{ getLogoImage(Settings('logo2')) }}" alt="Footer Logo" class="footer-logo img-fluid">
        <span class="text-white text-company">ENTERSOFT <span style="color: #20c3b5;">ACADEMY</span></span>
      </div>
      <div class="d-flex align-items-center f-bottom" >
        <a href="#" class="text-white text-normal privacy">Privacy Policy</a>
        <a href="#" class="text-white text-normal privacy">Terms & Conditions</a>

      </div>
    </footer>
  </div>
  <script>
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('passwordInput');
      const passwordToggleIcon = document.getElementById('passwordToggleIcon');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggleIcon.classList.remove('bi-eye-slash');
        passwordToggleIcon.classList.add('bi-eye');
      } else {
        passwordInput.type = 'password';
        passwordToggleIcon.classList.remove('bi-eye');
        passwordToggleIcon.classList.add('bi-eye-slash');
      }
    }
  </script>
  @endsection