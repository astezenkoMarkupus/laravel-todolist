<x-layout>
  <x-slot:title>
    Todo List
  </x-slot:title>

  <form method="post" action="{{ route('saveItem') }}" novalidate>
    @csrf

    @if($errors->any())
      <div class="errors">
        <ul>
          @foreach($errors->default->messages() as $error)
            <li>{{ $error[0] }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <fieldset>
      <label for="name">New Todo Item:</label>
      <input id="name" name="name" type="text" value="{{ old('name') }}" required/>
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
</x-layout>

