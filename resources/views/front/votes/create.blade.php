{!! Form::open(['route' => 'front.votes.store']) !!}
    {!! Form::submit('sad', ['name' => 'vote']) !!}
    {!! Form::submit('neutral', ['name' => 'vote']) !!}
    {!! Form::submit('happy', ['name' => 'vote']) !!}
{!! Form::close() !!}