<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    <form method="POST" action="/token">
    @csrf


    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    Search Term : <input type="text" name="term" value="">
    <button type="submit">Search</button>

    </form>
</div>
