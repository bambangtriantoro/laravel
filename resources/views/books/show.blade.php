@extends("layouts.main") 
@section("content")

<div class="row col-md-12">
    {{-- <article> --}}
        <h2>{!! $book->title !!}</h2>
        <p style="word-wrap: break-word;">{!! $book->description !!}</p>
        {{-- <i> By : </i> --}}
        @foreach($authors as $author)
        <i>By : {!! $author->user  !!}</i>
        @endforeach
    {{-- </article> --}}
    <br>


    @if (auth::guest())
        
    @else
    <div class="container">
        <div class="btn-group-horizontal">
            <form action="{{route('books.destroy', $book->id)}}" method="post">
            {{-- {!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) !!} --}} {{-- {!! link_to(route('articles.index'),
            "Back", ['class' => 'btn btn-raised btn-info']) !!} {!! link_to(route('articles.edit', $article->id), 'Edit',
            ['class'=> 'btn btn-raised btn-warning']) !!} --}}
            <a href="{{route('books.index')}}" class="btn btn-info">
            <span class="glyphicon glyphicon-arrow-left"></span> Back</a>
            <a href="{{route('books.edit',$book->id)}}" class="btn btn-warning">
            Edit</a> {{-- {!! Form::submit('Delete', array('class' => 'btn btn-raised btn-danger', "onclick"
            => "return confirm('are you sure?')")) !!} {!! Form::close() !!} --}}
            {{-- <form action="{{route('articles.destroy', $article->id)}}" method="post"> --}}
            <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure?')">
            <span class="glyphicon glyphicon-trash"></span> Delete</button> {{method_field('DELETE')}}
            {{ csrf_field() }}
            </form>
        </div>
    </div> 
    @endif
    
    
</div>
<hr>

<div class="col-md-12">
    <div class="col-md-6">
            <h3><i><u>Give Comments</u></i></h3>

            <form action="{{route('commentbook.store')}}" method="POST" class="form-horizontal" role="form"
            id="bookcomment">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="book_id" class="col-lg-3 control-label"> Book Title </label>

                    <div class="col-lg-9">
                        <input value="{{$value = $book->id}}" type="text" name="book_id" class="form-control" readonly>

                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-lg-3 control-label"> Comment </label>

                    <div class="col-lg-9">
                        <textarea name="description" id="description" class="form-control" rows="10" autofocus></textarea> {!! $errors->first('description')!!}
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label for="user" class="col-lg-3 control-label"> User </label>

                    <div class="col-lg-9">
                        <input type="text" name="user" class="form-control">

                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-9">
                        <button type="button" id="savecomment" class="btn btn-primary"> Save </button>
                    </div>
                    <div class="clear"></div>
                </div>
            </form>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <h3><i><u>Give Comments</u></i></h3>

            <div id="commentlist">
                @foreach($commentsbooks as $commentbook)
                <div style="outline: 1px solid #74AD1B;">
                    <p style="word-wrap: break-word;">comment : {!! $commentbook->description !!}</p>
                    <i>By : {!! $commentbook->user !!}</i>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection