<x-layout>
    @if(session('message'))
    {{session('message')}}
    @endif
    <h1>Veryfication link sent on your link kindly click the link sent through email in your mailbox.</h1>
    <form action="{{route('verification.send')}}" method="post">
        @csrf
        <button class="btn">Resend Verification Link</button>
    </form>
</x-layout>