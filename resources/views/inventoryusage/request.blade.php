<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>request</title>
</head>
{{Auth::user()->userID}}
<form method="post" action="{{ route('inventory.store') }}">
    @csrf
    <label for="itemId">Select a inventory:</label>
    <select class="form-control" name="itemId">
        @foreach($inventoryItem as $item)
          <option value="{{$item->itemId}}">{{$item->inventoryname}}</option>
        @endforeach
      </select><br/><br/>

    <input type="date" name="Startdate" id="Startdate"><br/><br/>
    <input type="date" name="Enddate" id="Enddate"><br/><br/>
    <input type="text" name="reason" id="reason"><br/><br/>
    <input type="text" name="status" id="status"><br/><br/>
    <input type="submit" name="submit">
<body>

</body>
</html>
