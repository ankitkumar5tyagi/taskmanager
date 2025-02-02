<x-Layout :title="'Task Manager: Home'" >
    <h1 class="heading">All Tasks</h1>
    <form id="search-form" method="GET" action="{{ route('home') }}">
        <input type="text" id="search-query" name="query" placeholder="Search..." class="form-input">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <x-taskcard :grouped="$grouped" :tasks="$tasks">
    </x-taskcard>
</x-Layout>