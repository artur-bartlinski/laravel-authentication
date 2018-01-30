<div class="table-responsive">
    <table class="table">
        <h2>Details</h2>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Title</th>
            <th scope="col">Forename</th>
            <th scope="col">Surname</th>
            <th scope="col">Date Of Birth</th>
            <th scope="col">Gender</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->title['name'] }}</td>
            <td>{{ $user->forename }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->gender['name'] }}</td>
            <td>
                <a href="{{ route('users.edit', auth()->id()) }}"><button type="button" class="btn btn-success">Edit</button></a>
            </td>
        </tr>
        </tbody>
    </table>
</div>