<!-- resources/views/import.blade.php -->
<h1>Import book items</h1>
<form action="{{ url('importBookItem') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Import</button>
</form>
