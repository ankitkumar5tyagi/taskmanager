
    <x-Layout :title="'Task Manager: Create Service'" >
        <div class="formcard">
            <h1 class="heading">Create Service</h1>
            <form action="{{route('service.store')}}" method="POST">
                @csrf
                
                <div class="inputcard">
                    <label for="service_name">Service Name:</label>
                    <input id="service_name" name="service_name" type="text"><br>
                </div>
                @error('service_name')
                <span style="color: red">{{$message}}</span>
                @enderror
                <div class="inputcard">
                    <label for="service_detail">Service Details:</label>
                    <input id="service_detail" name="service_detail" type="text"><br>
                </div>
                @error('service_detail')
                   <span style="color: red">{{$message}}</span> 
                @enderror
                <button class="btn" type="submit">Create Service</button>
            </form>
           @if(session('error'))
           <span style="color:red">{{session('error')}}</span>
           @endif
        </div>
        
    </x-Layout>
