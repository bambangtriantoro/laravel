@extends("layouts.main")
@section("content")

<form action="{{route('books.destroy', $article->id)}}" method="post">
    <input type="submit" value="delete" class="btn btn-danger" 
    onclick="return confirm('are you sure?')">
    {{method_field('DELETE')}}
    {{ csrf_field() }}
</form>

@endsection