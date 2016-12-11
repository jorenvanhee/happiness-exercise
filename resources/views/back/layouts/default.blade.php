{!! Form::open(['action' => 'Auth\LoginController@logout']) !!}
    {!! Form::button('Logout', ['type' => 'submit']) !!}
{!! Form::close() !!}

<hr>

@yield('content')