<h1>Edit Pet</h1>
<form action="{{ route('admin.pets.update', $pet->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label><br>
    <input type="text" name="name" value="{{ $pet->name }}" required><br>
    <label for="breed">Breed:</label><br>
    <input type="text" name="breed" value="{{ $pet->breed }}" required><br>
    <label for="age">Age:</label><br>
    <input type="number" name="age" value="{{ $pet->age }}" required><br>
    <label for="gender">Gender:</label><br>
    <input type="text" name="gender" value="{{ $pet->gender }}" required><br>
    <button type="submit">Save Changes</button>
</form>
