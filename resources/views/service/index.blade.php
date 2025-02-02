<x-layout>
    @foreach ($services as $service)
        <div style="display: flex; justify-content:center; align-items:center">
        {{$service->service_name}}
        <form action="{{route('service.destroy', $service->id)}}" method="post">
            @csrf
            @method('DELETE')
        <button class="dangerbtn" type="submit">Delete</button>  
        </form>
    </div>
    @endforeach
</x-layout>