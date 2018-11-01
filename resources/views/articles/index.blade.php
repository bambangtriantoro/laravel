@extends("layouts.main")
@section("content")

@if (auth::guest())
     
@else
    {{-- {!! link_to(route("articles.create"), "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!} --}}
    <a href="{{route('articles.create')}}" class="pull-right btn btn-primary">
    <span class="glyphicon glyphicon-file"></span> Create New Article</a>
@endif

<div class="row">    
    <h2 class="pull-left">List Articles</h2>
</div>
<div class="row m-t-50">
    <form action="{{route('articles.index')}}" method="get" class="form-inline ">
        <div class="form group">
            
            <input type="text" id='keywords' name="search" class="form-control"
            placeholder="search here">
            <button type="button" id='search' class="btn btn-primary">
                <span class="glyphicon glyphicon-search"></span> Search </button>
            
            <button type="button" id='newest' class="sort btn btn-info" data-sort="desc"> Newest </button>
            <button type="button" id='oldest' class="sort btn btn-default" data-sort="asc"> Oldest </button>
            
        </div>
    </form>
</div>

<div id="article-list">
    @include('articles.list')
</div>
{{-- @include('articles.list') --}}
@endsection