
<x-guest-layout>

    <x-jet-authentication-card >


        <style>


            html,body{
                margin: 0 auto;
                padding: 0;
            }
            .min-h-screen{
                height: 100%;
                 background:url('assets/img/blogin.jpg');
                background-size:cover ;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
.btnLogin{
    background-color: #98c1c4;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    text-align: center;
    width: 100%;
    display: block;
    margin-left: auto;
    margin-right: auto

}
        </style>
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}
        <x-slot name="logo">
{{--            <img src="{{ asset('img/madmouna_logo.png') }}" class="img-fluid" style=" height:100px !important;" />--}}
        </x-slot>
        <div class="bg_circle1"></div>
        <div class="bg_circle2"></div>
        <div class="bg_circle3"></div>
        <div class="square1"></div>
        <div class="square2"></div>



        <x-jet-validation-errors class="mb-4"  />
        <title>madmouna</title>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
{{--         {{ route('login') }}--}}
        <form method="POST" action="{{ route('login') }}"  >
            @csrf
            <div class="mt-4 mb-2 ml-3 mr-3">
                <img src="{{asset('assets/img/madmouna_logo.png')}}" class="img-fluid"  style=" height:47px !important;" />
            </div>
            <div class="mt-4">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Mot de passe') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="btnLogin" >
                    {{ __('CONNEXION') }}
                </x-jet-button>
            </div>
        </form>

    </x-jet-authentication-card>
    <div class="img-wave-1"></div>
    <div class="img-wave-2"></div>
</x-guest-layout>
