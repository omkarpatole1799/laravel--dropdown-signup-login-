<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    @if ($data = Session::get('user_name'))
                    {{ $data }}
    @endif


    <form action="signup_action" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="user_name">User Name</label>
            <input type="text" name="user_name">
            <span>
                @error('user_name')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="text" name="password" value=@if ($password = Session::get('password'))
                {{ $password }}
            @endif>
            <span>
                @error('password')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div>
            <label for="mobile">Mobile No</label>
            <input type="number" name="mobile" value=@if($mobile = Session::get('mobile'))
            {{ $mobile}} @endif>
            <span>
                @error('mobile')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div>
            <label for="image">Profile</label>
            <input type="file" name="image">
        </div>

        {{-- dropdown for selecting language --}}
        <div>
            <label for="dropdown">Choose language</label>
            <select name="languages" id="">
                <option value="javascript">Javascript</option>
                <option value="javascript">Javascript</option>
                <option value="javascript">Javascript</option>
                <option value="javascript">Javascript</option>
    
            </select>
        </div>

        <div>
            <button type="submit">Sign-up</button>
        </div>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
