@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.package.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.packages.update", [$package->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="package_type_id">{{ trans('cruds.package.fields.package_type') }}</label>
                <select class="form-control select2 {{ $errors->has('package_type') ? 'is-invalid' : '' }}" name="package_type_id" id="package_type_id" required>
                    @foreach($package_types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('package_type_id') ? old('package_type_id') : $package->package_type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('package_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('package_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.package_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="destination_id">{{ trans('cruds.package.fields.destination') }}</label>
                <select class="form-control select2 {{ $errors->has('destination') ? 'is-invalid' : '' }}" name="destination_id" id="destination_id" required>
                    @foreach($destinations as $id => $entry)
                        <option value="{{ $id }}" {{ (old('destination_id') ? old('destination_id') : $package->destination->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('destination'))
                    <div class="invalid-feedback">
                        {{ $errors->first('destination') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.destination_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="duration">{{ trans('cruds.package.fields.duration') }}</label>
                <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="number" name="duration" id="duration" value="{{ old('duration', $package->duration) }}" step="1">
                @if($errors->has('duration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('duration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="max_people">{{ trans('cruds.package.fields.max_people') }}</label>
                <input class="form-control {{ $errors->has('max_people') ? 'is-invalid' : '' }}" type="number" name="max_people" id="max_people" value="{{ old('max_people', $package->max_people) }}" step="1" required>
                @if($errors->has('max_people'))
                    <div class="invalid-feedback">
                        {{ $errors->first('max_people') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.max_people_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_price">{{ trans('cruds.package.fields.total_price') }}</label>
                <input class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" type="number" name="total_price" id="total_price" value="{{ old('total_price', $package->total_price) }}" step="0.01" required>
                @if($errors->has('total_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.total_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="min_age">{{ trans('cruds.package.fields.min_age') }}</label>
                <input class="form-control {{ $errors->has('min_age') ? 'is-invalid' : '' }}" type="number" name="min_age" id="min_age" value="{{ old('min_age', $package->min_age) }}" step="1" required>
                @if($errors->has('min_age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('min_age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.min_age_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="package_title">{{ trans('cruds.package.fields.package_title') }}</label>
                <input class="form-control {{ $errors->has('package_title') ? 'is-invalid' : '' }}" type="text" name="package_title" id="package_title" value="{{ old('package_title', $package->package_title) }}" required>
                @if($errors->has('package_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('package_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.package_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="display_image">{{ trans('cruds.package.fields.display_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('display_image') ? 'is-invalid' : '' }}" id="display_image-dropzone">
                </div>
                @if($errors->has('display_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('display_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.display_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slider_images">{{ trans('cruds.package.fields.slider_images') }}</label>
                <div class="needsclick dropzone {{ $errors->has('slider_images') ? 'is-invalid' : '' }}" id="slider_images-dropzone">
                </div>
                @if($errors->has('slider_images'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slider_images') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.slider_images_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="overview">{{ trans('cruds.package.fields.overview') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('overview') ? 'is-invalid' : '' }}" name="overview" id="overview">{!! old('overview', $package->overview) !!}</textarea>
                @if($errors->has('overview'))
                    <div class="invalid-feedback">
                        {{ $errors->first('overview') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.overview_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="trip_highlights">{{ trans('cruds.package.fields.trip_highlights') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('trip_highlights') ? 'is-invalid' : '' }}" name="trip_highlights" id="trip_highlights">{!! old('trip_highlights', $package->trip_highlights) !!}</textarea>
                @if($errors->has('trip_highlights'))
                    <div class="invalid-feedback">
                        {{ $errors->first('trip_highlights') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.trip_highlights_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="trip_difficulties">{{ trans('cruds.package.fields.trip_difficulties') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('trip_difficulties') ? 'is-invalid' : '' }}" name="trip_difficulties" id="trip_difficulties">{!! old('trip_difficulties', $package->trip_difficulties) !!}</textarea>
                @if($errors->has('trip_difficulties'))
                    <div class="invalid-feedback">
                        {{ $errors->first('trip_difficulties') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.trip_difficulties_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="best_season">{{ trans('cruds.package.fields.best_season') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('best_season') ? 'is-invalid' : '' }}" name="best_season" id="best_season">{!! old('best_season', $package->best_season) !!}</textarea>
                @if($errors->has('best_season'))
                    <div class="invalid-feedback">
                        {{ $errors->first('best_season') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.best_season_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="accommodation">{{ trans('cruds.package.fields.accommodation') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('accommodation') ? 'is-invalid' : '' }}" name="accommodation" id="accommodation">{!! old('accommodation', $package->accommodation) !!}</textarea>
                @if($errors->has('accommodation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('accommodation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.accommodation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="included">{{ trans('cruds.package.fields.included') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('included') ? 'is-invalid' : '' }}" name="included" id="included">{!! old('included', $package->included) !!}</textarea>
                @if($errors->has('included'))
                    <div class="invalid-feedback">
                        {{ $errors->first('included') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.included_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="excluded">{{ trans('cruds.package.fields.excluded') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('excluded') ? 'is-invalid' : '' }}" name="excluded" id="excluded">{!! old('excluded', $package->excluded) !!}</textarea>
                @if($errors->has('excluded'))
                    <div class="invalid-feedback">
                        {{ $errors->first('excluded') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.package.fields.excluded_helper') }}</span>
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
    Dropzone.options.displayImageDropzone = {
    url: '{{ route('admin.packages.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="display_image"]').remove()
      $('form').append('<input type="hidden" name="display_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="display_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($package) && $package->display_image)
      var file = {!! json_encode($package->display_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="display_image" value="' + file.file_name + '">')
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
    var uploadedSliderImagesMap = {}
Dropzone.options.sliderImagesDropzone = {
    url: '{{ route('admin.packages.storeMedia') }}',
    maxFilesize: 50, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="slider_images[]" value="' + response.name + '">')
      uploadedSliderImagesMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedSliderImagesMap[file.name]
      }
      $('form').find('input[name="slider_images[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($package) && $package->slider_images)
      var files = {!! json_encode($package->slider_images) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="slider_images[]" value="' + file.file_name + '">')
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
                xhr.open('POST', '{{ route('admin.packages.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $package->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
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