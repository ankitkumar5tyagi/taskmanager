<x-Layout :title="'Task Manager: Register'" >
    <div class="formcard">
        <h1 class="heading">Register</h1>
        <form action="/register" method="POST">
            @csrf
            <div class="inputcard">
                <label for="name">Name:</label>
                <input id="name" name="name" type="text"><br>
            </div>
            @error('name')
            <span style="color: red">{{$message}}</span>
            @enderror
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
            <div class="inputcard">
                <label for="password_confirmation">Confirm Password:</label>
                <input id="password_confirmation" name="password_confirmation" type="Password"><br>
            </div>
            <button class="btn" type="submit">Register</button>
        </form>
    </div>
</x-Layout>