@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.lesson.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.lessons.store") }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.lesson.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.lesson.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thumbnail">{{ trans('cruds.lesson.fields.thumbnail') }}</label>
                <div class="needsclick dropzone {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}" id="thumbnail-dropzone">
                </div>
                @if($errors->has('thumbnail'))
                    <div class="invalid-feedback">
                        {{ $errors->first('thumbnail') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.thumbnail_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="short_text">{{ trans('cruds.lesson.fields.short_text') }}</label>
                <textarea  class="form-control  {{ $errors->has('short_text') ? 'is-invalid' : '' }}" name="short_text" id="short_text">{{ old('short_text') }}</textarea>
                @if($errors->has('short_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.short_text_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="long_text">{{ trans('cruds.lesson.fields.long_text') }}</label>
                <textarea class="form-control editor {{ $errors->has('long_text') ? 'is-invalid' : '' }}" name="long_text" id="long_text">{{ old('long_text') }}</textarea>
                @if($errors->has('long_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('long_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.long_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="video">{{ trans('cruds.lesson.fields.video') }}</label>
                <div class="needsclick dropzone {{ $errors->has('video') ? 'is-invalid' : '' }}" id="video-dropzone">
                </div>
                @if($errors->has('video'))
                    <div class="invalid-feedback">
                        {{ $errors->first('video') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.video_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="position">{{ trans('cruds.lesson.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="number" name="position" id="position" value="{{ old('position', '') }}" step="1">
                @if($errors->has('position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.position_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="" for="meta_title">{{ trans('cruds.course.fields.meta_title') }}</label>
                <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', '') }}" >
                @if($errors->has('meta_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('meta_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.title_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="" for="meta_keyword">{{ trans('cruds.course.fields.meta_keyword') }}</label>
                <input class="form-control {{ $errors->has('meta_keyword') ? 'is-invalid' : '' }}" type="text" name="meta_keyword" id="meta_keyword" value="{{ old('meta_keyword', '') }}" >
                @if($errors->has('meta_keyword'))
                    <div class="invalid-feedback">
                        {{ $errors->first('meta_keyword') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.title_helper') }}</span>
            </div>

            
            <div class="form-group">
                <label class="" for="meta_description">{{ trans('cruds.course.fields.meta_description') }}</label>
                <input class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', '') }}" >
                @if($errors->has('meta_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('meta_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.course.fields.title_helper') }}</span>
            </div>

            
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_published" value="0">
                    <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">{{ trans('cruds.lesson.fields.is_published') }}</label>
                </div>
                @if($errors->has('is_published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.is_published_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_free') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_free" value="0">
                    <input class="form-check-input" type="checkbox" name="is_free" id="is_free" value="1" {{ old('is_free', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_free">{{ trans('cruds.lesson.fields.is_free') }}</label>
                </div>
                @if($errors->has('is_free'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_free') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.is_free_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedThumbnailMap = {}
Dropzone.options.thumbnailDropzone = {
    url: '{{ route('admin.lessons.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="thumbnail[]" value="' + response.name + '">')
      uploadedThumbnailMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedThumbnailMap[file.name]
      }
      $('form').find('input[name="thumbnail[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($lesson) && $lesson->thumbnail)
      var files = {!! json_encode($lesson->thumbnail) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="thumbnail[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.videoDropzone = {
    url: '{{ route('admin.lessons.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="video"]').remove()
      $('form').append('<input type="hidden" name="video" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="video"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($lesson) && $lesson->video)
      var file = {!! json_encode($lesson->video) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="video" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>

<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.lessons.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $course->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.editor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection