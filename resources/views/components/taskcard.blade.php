@props(['grouped', 'tasks'])

<div style="position: relative; display:flex; flex-wrap:wrap; justify-content:center; align-items:center">
    
    @foreach($grouped as $date => $tasksondate)
        <div style="width: 100%; background-color:darkslategrey; color:white"><h3>{{$date}} : {{$tasksondate->count()}}</h3></div>
        @foreach ($tasksondate as $task)
            <a href="{{route('task.show', $task)}}">
                <div class="taskcard">
                    <div class="tasktext">
                            {{$task->date}}
                    
                        <span style="margin-left: 10%">{{$task->task}}</span> 
                        <span class="{{ $task->status == 'Done' ? 'text-green-700' : ($task->status == 'Pending' ? 'text-yellow-700' : 'text-red-700') }}" style="margin-left: 10%">{{$task->status}} by {{(Auth::user() && $task->user->name == Auth::user()->name)? "You" : $task->user->name}}</span>  <hr>
                            {{$task->detail}} <br>
                            {{$task->customer_name}}
                            {{$task->customer_mobile}}
                    </div>
                    <div class="buttons">
                        <a class="warningbtn" href="{{route('task.edit', $task)}}">Edit</a><br>
                        <form action="{{route('task.destroy', $task->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        <button class="dangerbtn" type="submit">Delete</button>  
                        </form>
                    </div>
                </div>
            </a>
        @endforeach
    @endforeach
    <span style="width:100%">{{ $tasks->links() }}</span>
</div>