<h1>Data display</h1>

<table border=1>

    <tr>
        <th>id</th>
        <th>user_name</th>
        <th>password</th>
        <th>mob</th>
        <th>profile</th>
    </tr>

    @foreach($members as $member)
    <tr>
        <a href=""></a>
        <td>{{ $member->id }}</td>
        <td>{{ $member->uname }}</td>
        <td>{{ $member->password }}</td>
        <td>{{ $member->mob }}</td>
        <td><a href="{{ asset('/public/images/'.$member->profile) }}"> <img src="{{ asset('/public/images/'.$member->profile) }}" alt="profile"> </a> </td>
    </tr>

    @endforeach
</table>