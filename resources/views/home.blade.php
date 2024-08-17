<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
  >
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo List</title>
</head>
<body>
  <h1>ToDo List</h1>
  <form method="post" action="{{ route('saveItem') }}">
    {{ csrf_field() }}
    <fieldset>
      <label for="input">New Todo Item:</label>
      <input id="input" name="input"/>
      <button>Save Item</button>
    </fieldset>
  </form>

  <br>
  <br>

  <h2>ToDo List Items:</h2>

  @foreach($listItems as $item)
    <div>
      Item: {{ $item->name }}
      <form method="post" action="{{ route('markComplete', $item->id) }}">
        {{ csrf_field() }}
        <button>Mark as Complete</button>
      </form>
    </div>
  @endforeach

  @if(count($listItemsCompleted))
    <br>
    <br>

    <h2>Completed Items:</h2>

    @foreach($listItemsCompleted as $item)
      <div>
        Item: {{ $item->name }}
        <form method="post" action="{{ route('markUncompleted', $item->id) }}">
          {{ csrf_field() }}
          <button>Mark as Uncompleted</button>
        </form>
      </div>
    @endforeach
  @endif

</body>
</html>
