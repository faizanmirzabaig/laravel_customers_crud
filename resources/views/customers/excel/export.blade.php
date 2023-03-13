<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Is_Married</th>
            <th>Status</th>

            <th>Created At</th>
            <th>Updated At</th>

        </tr>
    </thead>
    <tbody>
        <tr></tr>
        @foreach($customers as $key => $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->mobile }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->gender }}</td>
            <td>{{ $customer->is_married }}</td>
            <td>{{ $customer->status }}</td>
            <td>{{ $customer->created_at }}</td>
            <td>{{ $customer->updated_at }}</td>


        </tr>
        @endforeach
    </tbody>
</table>
