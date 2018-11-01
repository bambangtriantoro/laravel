<div class="form-group">
    {{-- {!! Form::label('title', 'Title', array('class' => 'col-lg-3 control-label')) !!} --}}
    <label for="title" class="col-lg-3 control-label">Title</label>

    <div class="col-lg-9">
        {{-- {!! Form::text('title', null, array('class' => 'form-control','autofocus' => 'true')) !!} --}}
        <input type="text" name="title" id="title" class="form-control" 
        value="{{!empty($article->title) ? $article->title : ''}}">

        <div class="text-danger">{!! $errors->first('title') !!}</div>
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    {{-- {!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!} --}}
    <label for="content" class="col-lg-3 control-label">Content</label>

    <div class="col-lg-9">
        {{-- {!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 10)) !!} --}}
        <textarea name="content" id="content" rows="10" class="form-control">
        {{!empty($article->content) ? $article->content : ''}}</textarea>

        <div class="text-danger">{!! $errors->first('content') !!}</div>
    </div>
    <div class="clear"></div>
</div>
<div class="form-group">
    <div class="col-lg-3"></div>
        <div class="col-lg-9">
        {{-- {!! Form::submit('Save', array('class' => 'btn btn-raised btn-primary')) !!}
        {!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-raised btn-info']) !!} --}}
        <button type="submit"  class="btn btn-primary">
            <span class="glyphicon glyphicon-save"> Save </span></button>
        <a href="{{route('articles.index')}}" class="btn btn-info">
            <span class="glyphicon glyphicon-arrow-left"></span> Back </a>

        </div>
    <div class="clear"></div>
</div>