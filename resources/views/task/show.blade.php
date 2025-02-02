<x-layout>
    <div style="position: relative; text-align: left; width:80%; padding:10px; margin:30px auto; border-radius:15px; border: 1px solid rgb(226, 223, 223); box-shadow: 10px 10px 15px rgba(0,0,0,0.1)">
        <h1 style="float: right">{{$task->status}}</h1>
        <h1>Date: {{$task->date}}</h1>
        <h1>Task: {{$task->task}}</h1>
        <h1>Detail: {{$task->detail}}</h1>
        <h1>Customer Name: {{$task->customer_name}}</h1>
        <h1>Customer Mobile: {{$task->customer_mobile}}</h1>
        <h1>Created at: {{$task->created_at}}</h1>
        <h1>Updated at: {{$task->updated_at}}</h1>
        <h1>User: {{$task->user->name}}</h1>
        <div class="buttons">
            <a class="warningbtn" href="{{route('task.edit', $task)}}">Edit</a><br>
            <form action="{{route('task.destroy', $task->id)}}" method="post">
                @csrf
                @method('DELETE')
            <button class="dangerbtn" type="submit">Delete</button>  
            </form>
        </div>
    </div>
</x-layout>