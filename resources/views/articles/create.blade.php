@extends("layouts.main")
@section("content")
<h3>Create a Article</h3>
    {{-- {!! Form::open(['route' => 'articles.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
    @include('articles.form')
    {!! Form::close() !!} --}}

    <form action="{{route('articles.store')}}" method="post" class="form-horizontal"
    role="form">
    {{ csrf_field() }} 
    @include('articles.form')
    </form>

@endsection