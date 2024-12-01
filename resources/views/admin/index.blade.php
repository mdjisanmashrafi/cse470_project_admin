<h1>Pets Information</h1>
<a href="{{ route('admin.pets.create') }}">Add New Pet</a>
<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Breed</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pets as $pet)
            <tr>
                <td>{{ $pet->name }}</td>
                <td>{{ $pet->breed }}</td>
                <td>{{ $pet->age }}</td>
                <td>{{ $pet->gender }}</td>
                <td>
                    <a href="{{ route('admin.pets.edit', $pet->id) }}">Edit</a>
                    <form action="{{ route('admin.pets.destroy', $pet->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
