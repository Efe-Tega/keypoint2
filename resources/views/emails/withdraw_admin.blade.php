@component('mail::message')
    # Withdrawal Request

    {{ $user->fullname }} ({{ $user->email }}) has requested a withdrawal of NGN{{ number_format($amount, 2) }}.

    Please review this request in the admin panel.

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
