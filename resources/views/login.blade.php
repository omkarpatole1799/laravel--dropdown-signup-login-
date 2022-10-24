<form action="login_action" method="POST">
    @csrf
    @if ($data = Session::get('error'))
                    {{ $data }}
    @endif

    <div>
        <label for="user_name">User Name</label>
        <input type="text" name="user_name">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="text" name="password">
    </div>

    

    <div>
        <button type="submit">Login</button>
    </div>

    

</form>