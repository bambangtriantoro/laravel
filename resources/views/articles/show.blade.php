@extends("layouts.main") 
@section("content")

<div class="row col-md-12">
    <article>
        <h2>{!! $article->title !!}</h2>
        <p style="word-wrap: break-word;">{!! $article->content !!}</p>
        <i>By {!! $article->author !!}</i>

    </article><br>

    @if (auth::guest())
        
    @else  
    <div class="container">
        <div class="btn-group-horizontal">
            <form action="{{route('articles.destroy', $article->id)}}" method="post">
            
            {{-- {!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) !!}
            {!! link_to(route('articles.index'),
            "Back", ['class' => 'btn btn-raised btn-info']) !!}
            {!! link_to(route('articles.edit', $article->id), 'Edit',
            ['class'=> 'btn btn-raised btn-warning']) !!} --}}

            <a href="{{route('articles.index')}}" class="btn btn-info">
            <span class="glyphicon glyphicon-arrow-left"></span> Back</a>
            <a href="{{route('articles.edit',$article->id)}}" class="btn btn-warning">
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
        {{-- <div class="col"> --}}
            <h3><i><u>Give Comments</u></i></h3>
            {{-- {!! Form::open(['route' => 'comments.store', 'class' => 'form- horizontal', 'role' => 'form']) !!} --}}
            <form action="{{route('comments.store')}}" method="POST" class="form-horizontal"
            id="articlecomment" role="form">
                {{ csrf_field() }}

                <div class="form-group">
                    {{-- {!! Form::label('article_id', 'Title', array('class' => 'col-lg-3 control-label')) !!} --}}
                    <label for="article_id" class="col-lg-3 control-label"> Title </label>

                    <div class="col-lg-9">
                        {{-- {!! Form::text('article_id', $value = $article->id, array('class' => 'form-control', 'readonly')) !!} --}}
                        <input value="{{$value = $article->id}}" type="text" name="article_id" class="form-control" readonly>

                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    {{-- {!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!} --}}
                    <label for="content" class="col-lg-3 control-label"> Comment </label>

                    <div class="col-lg-9">
                        {{-- {!! Form::textarea('content', null, array('class' => 'form- control', 'rows' => 10, 'autofocus' => 'true')) !!} --}}
                        <textarea name="content" id="content" class="form-control" rows="10" autofocus></textarea> {!! $errors->first('content')!!}
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    {{-- {!! Form::label('user', 'User', array('class' => 'col-lg-3 control-label')) !!} --}}
                    <label for="user" class="col-lg-3 control-label"> User </label>

                    <div class="col-lg-9">
                        {{-- {!! Form::text('user', null, array('class' => 'form-control')) !!} --}}
                        <input type="text" name="user" class="form-control">

                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-9">
                        {{-- {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!} --}}
                        <button type="button" id="savecomment" class="btn btn-primary"> Save </button>
                    </div>
                    <div class="clear"></div>
                </div>
            </form>
            {{-- {!! Form::close() !!} --}}
        {{-- </div> --}}
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <h3><i><u>Give Comments</u></i></h3>
            <div id="commentlist">
                @foreach($comments as $comment)
                    <div style="outline: 1px solid #74AD1B;">
                    <p style="word-wrap: break-word;">comment : {!! $comment->content !!}</p>
                    <i>By : {!! $comment->user !!}</i>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection