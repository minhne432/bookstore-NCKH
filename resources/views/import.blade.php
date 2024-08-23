<!-- resources/views/import.blade.php -->
<h1>Import recommend books</h1>
<form action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Import</button>
</form>
