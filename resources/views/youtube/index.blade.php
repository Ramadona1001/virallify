<form action="{{ route('youtube.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <p><input type="text" name="title" placeholder="Enter Video Title" /></p>
    <p><textarea name="description" cols="30" rows="10" placeholder="Video description"></textarea></p>
    <p><input type="file" name="video" /></p>
    <p>Video Thumbnail: <input type="file" name="image" /></p>
    <button type="submit" name="submit">Submit</button>
</form>