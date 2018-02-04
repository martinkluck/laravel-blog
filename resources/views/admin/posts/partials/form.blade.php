{{ Form::hidden('user_id', auth()->user()->id) }}
<div class="form-group">
    {{ Form::label('category_id','Categorías') }}
    {{ Form::select('category_id',$categories,null,['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{Form::label('name','Nombre de la etiqueta')}}
    {{Form::text('name',null,['class'=>'form-control', 'id'=>'name'])}}
</div>
<div class="form-group">
    {{Form::label('slug','Url Amigable')}}
    {{Form::text('slug',null,['class'=>'form-control', 'id'=>'slug'])}}
</div>
<div class="form-group">
    {{Form::label('file','Imagen')}}
    {{Form::file('file')}}
</div>
<div class="form-group">
    {{Form::label('status','Estado')}}
    <label>
        {{Form::radio('status', 'PUBLISHED')}} Publicado
    </label>
    <label>
        {{Form::radio('status', 'DRAFT')}} Borrador
    </label>
</div>
<div class="form-group">
    {{Form::label('tags','Etiquetas')}}
    @foreach($tags as $tag)
        <label>
            {{Form::checkbox('tags[]', $tag->id)}} {{$tag->name}}
        </label>
    @endforeach
</div>
<div class="form-group">
    {{Form::label('excerpt', 'Extracto')}}
    {{Form::textarea('excerpt',null,['class'=>'form-control','rows'=>'2'])}}
</div>
<div class="form-group">
    {{Form::label('body','Descripción')}}
    {{Form::textarea('body',null,['class'=>'form-control'])}}
</div>
<div class="form-group">
    {{Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'])}}
</div>
@section('styles')
    <link rel="stylesheet" href="{{asset('js/plugins/Trumbowyg/dist/ui/trumbowyg.min.css')}}">
@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/speakingurl@14.0.1/speakingurl.min.js"></script>
    <script src="{{asset('js/plugins/stringToSlug/jquery.stringtoslug.min.js')}}"></script>
    {{--<script src="{{asset('js/plugins/ckeditor/ckeditor.js')}}"></script>--}}
    <script src="{{asset('js/plugins/Trumbowyg/dist/trumbowyg.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#name, #slug').stringToSlug({
                getPut: '#slug'
            });
            $('#body').trumbowyg();
        });
        /*ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
            console.error( error );
        } );*/
    </script>
@endsection