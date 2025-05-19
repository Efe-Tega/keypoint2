<!-- resources/views/auth/reset-password.blade.php -->
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="text" name="token" value="{{ $token }}">
    <input type="email" name="email" required />
    <input type="password" name="password" required />
    <input type="password" name="password_confirmation" required />
    <button type="submit">Reset Password</button>
</form>
