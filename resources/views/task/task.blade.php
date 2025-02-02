<x-layout>
    <h1 class="heading">Hello {{Auth::user()->name}}</h1>
    @if (session('success'))
        {{session('success')}}
    @endif

<x-taskcard :grouped="$grouped" :tasks="$tasks">
</x-taskcard>
    
</x-layout>