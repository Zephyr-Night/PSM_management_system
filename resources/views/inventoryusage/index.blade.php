<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>


<table>
    <tr>
        <th>start date</th>
        <th>end date</th>
        <th>reason</th>
        <th>status</th>
    </tr>
    @foreach ($inventorylist as $inventoryindex)
    <tr>
        <td>{{$inventoryindex->inventoryitem->inventoryname}}</td>
        <td>{{$inventoryindex->Startdate}}</td>
        <td>{{$inventoryindex->Enddate}}</td>
        <td>{{$inventoryindex->reason}}</td>
        <td>{{$inventoryindex->status}}</td>
    </tr>

    @endforeach
</table>



<button type="button" onclick="window.location='{{url('/test')}}'">home.</button>



<body>

</body>
</html>
