<div class="table-responsive">
    <table class="table">
        <h2>Current address</h2>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Address Line 1</th>
            <th scope="col">Address Line 2</th>
            <th scope="col">Town</th>
            <th scope="col">County</th>
            <th scope="col">Country</th>
            <th scope="col">Postal Code</th>
            <th scope="col">From Date</th>
            <th scope="col">Until date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>{{ $address_line_1 }}</td>
            <td>{{ $address_line_2 }}</td>
            <td>{{ $town }}</td>
            <td>{{ $county }}</td>
            <td>{{ $country }}</td>
            <td>{{ $postal_code }}</td>
            <td>{{ $from_date }}</td>
            <td>{{ $until_date }}</td>
            <td>
                <a href="{{ route('addresses.edit', $address_id) }}"><button type="button" class="btn btn-success">Edit</button></a>
            </td>
        </tr>
        </tbody>
    </table>
</div>