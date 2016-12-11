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
            <td>{{ isset($votesToday['happy']) ? $votesToday['happy']->percentage : '0' }}</td>
            <td>{{ isset($votesToday['neutral']) ? $votesToday['neutral']->percentage : '0' }}</td>
            <td>{{ isset($votesToday['sad']) ? $votesToday['sad']->percentage : '0' }}</td>
        </tr>
        <tr>
            <th>Week</th>
            <td>{{ isset($votesWeek['happy']) ? $votesWeek['happy']->percentage : '0' }}</td>
            <td>{{ isset($votesWeek['neutral']) ? $votesWeek['neutral']->percentage : '0' }}</td>
            <td>{{ isset($votesWeek['sad']) ? $votesWeek['sad']->percentage : '0' }}</td>
        </tr>
        <tr>
            <th>Month</th>
            <td>{{ isset($votesMonth['happy']) ? $votesMonth['happy']->percentage : '0' }}</td>
            <td>{{ isset($votesMonth['neutral']) ? $votesMonth['neutral']->percentage : '0' }}</td>
            <td>{{ isset($votesMonth['sad']) ? $votesMonth['sad']->percentage : '0' }}</td>
        </tr>
    </tbody>
</table>
@stop
