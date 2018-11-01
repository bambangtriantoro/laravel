@extends("layouts.main")
@section("content")

@if (auth::guest())
    
@else
    <a href="{{route('books.create')}}" class="pull-right btn btn-primary">
    <span class="glyphicon glyphicon-file"></span> Create New Book</a>
@endif


<div class="row">    
    <h2 class="pull-left">Book Title</h2>
    {{-- {!! link_to(route("articles.create"), "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!} --}}
    {{-- <a href="{{route('books.create')}}" class="pull-right btn btn-primary">
    <span class="glyphicon glyphicon-file"></span> Create New Book</a>  --}}
</div>
<div class="row m-t-50">
    <form action="{{route('books.index')}}" method="get" class="form-inline ">
        <div class="form group">
            
            <input type="text" id="keywords" name="search" class="form-control"
            placeholder="search here">
            <button type="button" id="search" class="btn btn-primary">
                <span class="glyphicon glyphicon-search"></span> Search </button>
            <button type="button" id='newest' class="sort btn btn-info" data-sort="desc"> Newest </button>
            <button type="button" id='oldest' class="sort btn btn-default" data-sort="asc"> Oldest </button>
        </div>
    </form>
</div>

<div id="book-list">
    @include('books.list')
</div>

@endsection