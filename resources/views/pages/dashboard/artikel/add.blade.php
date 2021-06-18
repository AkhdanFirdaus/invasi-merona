@extends('layouts.dashboard')
@push('nav')
<li class="breadcrumb-item"><a href="{{ route('artikel.index') }}">Artikel</a></li>
<li class="breadcrumb-item active">@if(isset($artikel)) Edit @else Tambah @endif</li>
@endpush

@section('content')
<div class="mt-4">
    <form
        action="@if(isset($artikel)){{ route('artikel.update', $artikel->id) }}@else{{ route('artikel.store') }}@endif"
        method="POST">
        @csrf
        @if (isset($artikel))
        <input type="hidden" name="_method" value="PUT">
        @endif
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" class="form-control" name="title"
                value="@if(isset($artikel)){{ $artikel->title }}@endif">
        </div>
        <div class="form-group">
            <label for="content">Konten</label>
            <textarea name="content" id="mytextarea" class="form-control" cols="30"
                rows="10">@if(isset($artikel)){!! $artikel->content !!}@endif</textarea>
        </div>
        <div class="mt-4 d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-danger" type="reset">Reset</button>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>

@endsection

@push('script')
<script src="{{ mix("js/tinymce/tinymce.min.js") }}"></script>
<script>
    var editor_config = {
        path_absolute : "/",
        selector: '#mytextarea',
        relative_urls: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
            } else {
            cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
            url : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no",
            onMessage: (api, message) => {
                callback(message.content);
            }
            });
        }
        };
        tinymce.init(editor_config);
</script>
@endpush
