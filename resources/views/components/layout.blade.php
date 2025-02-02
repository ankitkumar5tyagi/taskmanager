@props(['title'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>{{$title ?? 'Task Manager'}}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <main style="width:90%; text-align:center; align-items:center; margin:auto; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
        
            <Nav style=" padding:.5em; border-radius:5px; width:100%; background-color: darkslategray; color:white; font-size:1em; margin-top:1em">
                
                    <div style="display: flex; justify-content:space-between; align-items:center">
                        <div>
                            <a href="/">Home</a>
                            @auth
                                <a href="/task">Your_Tasks</a>
                                <a href="{{route('task.create')}}">Create_Task</a>  
                                <a href="{{route('service.create')}}">Add_Service</a>  
                            @endauth
                            
                        </div>
                        
                            <div style="">
                                @guest
                                    <a href="/register">Register</a>
                                    <a href="/login">Login</a>
                                @endguest
                                @auth
                                    <a href="/logout">Logout</a> 
                                @endauth
                            </div>
                        
                    </div>   
                
            </Nav>
       
        <section>
            {{$slot}}
        </section>
    </main>
</body>
</html>