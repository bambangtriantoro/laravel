@extends("layouts.main")
@section("content")

<h3>Edit Article</h3>
    {{-- {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' =>'form']) !!}
    @include('articles.form')
{!! Form::close() !!} --}}

<form method="post" action="{{route('articles.update', $article->id)}}" method="put"
    class="form-horizontal" role="form">
    {{method_field('PUT')}}
    {{ csrf_field() }}
    @include('articles.form')
</form>


@endsection