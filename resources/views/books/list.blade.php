@foreach($books as $book)

<div class="row">
    <div class="bs-callout bs-callout-warning">
        <h1>{!!$book->title!!}</h1>
        <p style="word-wrap: break-word;">{!! str_limit($book->description, 250) !!}</p> 
        <p>{!!$book->created_at!!}</p>
        <a href="{{route('books.show', $book->id)}}">Read More...</a>
    </div>
</div>
@endforeach