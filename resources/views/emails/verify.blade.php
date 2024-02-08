<p>Hello,</p>

<p>Please click the following link to verify your email:</p>
{{-- Debugging: Remove after confirming token is available --}}
Token present: {{ isset($token) ? 'Yes' : 'No' }} // This will show if the token variable exists

@if (isset($token))
    <a href="{{ route('verify.email', ['token' => $token]) }}">Verify Email</a>
@else
    Token is missing!
@endif
