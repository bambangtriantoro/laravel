@foreach($articles as $article)

<article class="row">
    <div class="bs-callout bs-callout-warning">
        <h1>{!!$article->title!!}</h1>
        <p style="word-wrap: break-word;">{!! str_limit($article->content, 250) !!}</p>
        <p>{!!$article->created_at!!}</p>
        <a href="{{route('articles.show', $article->id)}}">Read More...</a>
    </div>
</article>
@endforeach
<div>
    {{-- {!! $articles->render() !!} --}}
</div>