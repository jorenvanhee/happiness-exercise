@extends('back.layouts.default')

@section('content')
<table border="1">
    <thead>
        <tr>
            <th></th>
            <th>happy</th>
            <th>neutral</th>
            <th>sad</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Day</th>
            <td>{{ $voteStatsDay->for('happy')->percentage() }}</td>
            <td>{{ $voteStatsDay->for('neutral')->percentage() }}</td>
            <td>{{ $voteStatsDay->for('sad')->percentage() }}</td>
        </tr>
        <tr>
            <th>Week</th>
            <td>{{ $voteStatsWeek->for('happy')->percentage() }}</td>
            <td>{{ $voteStatsWeek->for('neutral')->percentage() }}</td>
            <td>{{ $voteStatsWeek->for('sad')->percentage() }}</td>
        </tr>
        <tr>
            <th>Month</th>
            <td>{{ $voteStatsMonth->for('happy')->percentage() }}</td>
            <td>{{ $voteStatsMonth->for('neutral')->percentage() }}</td>
            <td>{{ $voteStatsMonth->for('sad')->percentage() }}</td>
        </tr>
    </tbody>
</table>
@stop
