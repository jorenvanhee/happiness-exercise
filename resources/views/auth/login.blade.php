{!! Form::open(['action' => 'Auth\LoginController@login']) !!}
    @if ($errors->count())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div>
        {!! Form::label('email') !!}
        {!! Form::email('email') !!}
    </div>
    <div>
        {!! Form::label('password') !!}
        {!! Form::password('password') !!}
    </div>
    {!! Form::button('login', ['type' => 'submit']) !!}
{!! Form::close() !!}
