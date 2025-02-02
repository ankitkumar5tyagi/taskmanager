<x-Layout>
<div class="formcard">
    <h1 class="heading">Create Task</h1>
    <form action="{{route('task.store')}}" method="POST">
        @csrf
        <div class="inputcard">
            <label for="date">Date:</label>
            <input id="date" name="date" type="date"><br>
        </div>
        @error('date')
        <span style="color: red">{{$message}}</span>
        @enderror
        <div class="inputcard">
            <label for="task">Task Name:</label>
            <select name="task" id="task">
                @foreach ($services as $service)
                    <option value="{{$service->service_name}}">{{$service->service_name}}</option>  
                @endforeach
            </select>
        </div>
        @error('task')
        <span style="color: red">{{$message}}</span>
        @enderror
        <div class="inputcard">
            <label for="detail">Detail:</label>
            <input id="detail" name="detail" type="text"><br>
        </div>
        @error('detail')
        <span style="color: red">{{$message}}</span>
        @enderror
        <div class="inputcard">
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="Pending">Pending</option>
                <option value="Done">Done</option>
                <option value="Denied">Denied</option>
            </select>
        </div>
        @error('status')
           <span style="color: red">{{$message}}</span> 
        @enderror
        <div class="inputcard">
            <label for="customer_name">Customer Name:</label>
            <input name="customer_name" id="customer_name">
        </div>
        @error('customer_name')
           <span style="color: red">{{$message}}</span> 
        @enderror
        <div class="inputcard">
            <label for="customer_mobile">Customer Mobile:</label>
            <input name="customer_mobile" id="customer_mobile">
        </div>
        @error('customer_mobile')
           <span style="color: red">{{$message}}</span> 
        @enderror
    
        <button class="btn" type="submit">Add Task</button>
    </form>
</div>
</x-Layout>
