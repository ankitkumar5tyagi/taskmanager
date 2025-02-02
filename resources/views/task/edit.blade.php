<x-Layout>
    <div class="formcard">
        <h1 class="heading">Edit Task</h1>
        <form action="{{route('task.update', $task->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="inputcard">
                <label for="date">Date:</label>
                <input value="{{$task->date}}" id="date" name="date" type="date"><br>
            </div>
            @error('date')
            <span class="text-red-700">{{$message}}</span>
            @enderror
            <div class="inputcard">
                <label for="task">Task Name:</label>
                <select name="task" id="task">
                    @foreach ($services as $service)
                        <option value="{{$service->service_name}}" {{($task->task==$service->service_name)?'selected': ""}}>{{$service->service_name}}</option>  
                    @endforeach
                </select>
            </div>
            @error('task')
            <span class="text-red-700">{{$message}}</span>
            @enderror
            <div class="inputcard">
                <label for="detail">Detail:</label>
                <input value="{{$task->detail}}" id="detail" name="detail" type="text"><br>
            </div>
            @error('detail')
            <span class="text-red-700">{{$message}}</span>
            @enderror
            <div class="inputcard">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="Pending" {{($task->status=="Pending")?'selected': ""}}>Pending</option>
                    <option value="Done" {{($task->status=="Done")?'selected': ""}}>Done</option>
                    <option value="Denied" {{($task->status=="Denied")?'selected': ""}}>Denied</option>
                </select>
            </div>
            @error('status')
               <span class="text-red-700">{{$message}}</span> 
            @enderror
            <div class="inputcard">
                <label for="customer_name">Customer Name:</label>
                <input value="{{$task->customer_name}}" name="customer_name" id="customer_name">
            </div>
            @error('customer_name')
               <span class="text-red-700">{{$message}}</span> 
            @enderror
            <div class="inputcard">
                <label for="customer_mobile">Customer Mobile:</label>
                <input value="{{$task->customer_mobile}}" name="customer_mobile" id="customer_mobile">
            </div>
            @error('customer_mobile')
               <span class="text-red-700">{{$message}}</span> 
            @enderror
        
            <button class="btn" type="submit">Update Task</button>
        </form>
    </div>
    </x-Layout>