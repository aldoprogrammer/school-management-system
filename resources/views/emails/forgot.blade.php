<x-mail::message>
    Hello admin,

    Please click the link below to reset your password.

    @php
        $url = url('reset/' . $user->remember_token);
    @endphp

    <x-mail::button :url="$url" color="success">
        Reset your password
    </x-mail::button>

    If you did not request a password reset, no further action is required.

    Thanks,
    School
</x-mail::message>
