{!! Form::open(['action' => 'Auth\ResetPasswordController@reset']) !!}
    @if ($errors->count())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::hidden('token', $token) !!}
    <div>
        {!! Form::label('email') !!}
        {!! Form::email('email') !!}
    </div>
    <div>
        {!! Form::label('password') !!}
        {!! Form::password('password') !!}
    </div>
    <div>
        {!! Form::label('password_confirmation') !!}
        {!! Form::password('password_confirmation') !!}
    </div>
    {!! Form::button('Reset password', ['type' => 'submit']) !!}
{!! Form::close() !!}
