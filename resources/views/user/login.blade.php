<x-Layout :title="'Task Manager: Login'" >
    <div class="formcard">
        <h1 class="heading">Login</h1>
        <form action="/login" method="POST">
            @csrf
            
            <div class="inputcard">
                <label for="email">Email:</label>
                <input id="email" name="email" type="text"><br>
            </div>
            @error('email')
            <span style="color: red">{{$message}}</span>
            @enderror
            <div class="inputcard">
                <label for="password">Password:</label>
                <input id="password" name="password" type="Password"><br>
            </div>
            @error('password')
               <span style="color: red">{{$message}}</span> 
            @enderror
            <button class="btn" type="submit">Login</button>
        </form>
       @if(session('error'))
       <span style="color:red">{{session('error')}}</span>
       @endif
    </div>
    
</x-Layout>