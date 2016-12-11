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
            <td>70%</td>
            <td>20%</td>
            <td>10%</td>
        </tr>
        <tr>
            <th>Month</th>
            <td>70%</td>
            <td>20%</td>
            <td>10%</td>
        </tr>
    </tbody>
</table>