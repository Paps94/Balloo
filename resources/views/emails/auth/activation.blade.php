@component('mail::message')
# Activate your account

    Thank you for registering, please activate your account.
<br><br>

@component('mail::button', ['url' => route('auth.activate', [
                                  'email' => $user->email,
                                  'token' => $user->activation_token
                              ])
                          ]
          )
    Activate
@endcomponent

<br>Thanks,<br>
  the {{ config('app.name') }} team
@endcomponent
