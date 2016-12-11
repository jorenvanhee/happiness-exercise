@if (session('status'))
    <p>{{ session('status') }}</p>
@endif
{!! Form::open(['action' => 'Auth\ForgotPasswordController@sendResetLinkEmail']) !!}
    {!! Form::email('email') !!}
    {!! Form::button('Send password reset email', ['type' => 'submit']) !!}
{!! Form::close() !!}