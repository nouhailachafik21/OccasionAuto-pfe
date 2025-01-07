
<x-guest-layout>
    <x-jet-authentication-card>

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
#profile{
    padding: 8px 20px;
    margin: 4px;
    outline: none;
    border: 1px solid #ced0d2;
    border-radius: 6px;
    color: #636363;

    width: 392px;
}
    </style>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mt-4 mb-2 ml-3 mr-3">
                <img src="{{asset('assets/img/madmouna_logo.png')}}" class="img-fluid" style=" height:47px !important;" />
            </div>
            <div>
                <x-jet-label for="name" value="{{ __('Nom') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Profile') }}" />

                <select  name="profile" id="profile">
                    <option value="" disabled selected hidden>profile</option>
                     <option value="Expert">Expert</option>
                     <option value="Gestionnaire">Gestionnaire</option>
                </select>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>
                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">


                <x-jet-button class="ml-4" style="background-color:#98c1c4 ">
                    {{ __('Inscription') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>


