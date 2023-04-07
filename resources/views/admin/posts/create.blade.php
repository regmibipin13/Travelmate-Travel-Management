@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.post.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">{{ trans('cruds.post.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('title', '') }}">
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="slug">{{ trans('cruds.post.fields.slug') }}</label>
                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug"
                        id="slug" value="{{ old('slug', '') }}" required>
                    @if ($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.slug_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="post_category_id">{{ trans('cruds.post.fields.post_category') }}</label>
                    <select class="form-control select2 {{ $errors->has('post_category') ? 'is-invalid' : '' }}"
                        name="post_category_id" id="post_category_id" required>
                        @foreach ($post_categories as $id => $entry)
                            <option value="{{ $id }}" {{ old('post_category_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('post_category'))
                        <div class="invalid-feedback">
                            {{ $errors->first('post_category') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.post_category_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="display_image">{{ trans('cruds.post.fields.display_image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('display_image') ? 'is-invalid' : '' }}"
                        id="display_image-dropzone">
                    </div>
                    @if ($errors->has('display_image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('display_image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.display_image_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="body">{{ trans('cruds.post.fields.body') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body">{!! old('body') !!}</textarea>
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.body_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="published_at">{{ trans('cruds.post.fields.published_at') }}</label>
                    <input class="form-control datetime {{ $errors->has('published_at') ? 'is-invalid' : '' }}"
                        type="text" name="published_at" id="published_at" value="{{ old('published_at') }}" required>
                    @if ($errors->has('published_at'))
                        <div class="invalid-feedback">
                            {{ $errors->first('published_at') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.published_at_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="tags">{{ trans('cruds.post.fields.tags') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]"
                        id="tags" multiple required>
                        @foreach ($tags as $id => $tag)
                            <option value="{{ $id }}" {{ in_array($id, old('tags', [])) ? 'selected' : '' }}>
                                {{ $tag }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('tags'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tags') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.tags_helper') }}</span>
                </div>
                <div class="form-group">
                    <div class="form-check {{ $errors->has('enabled') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="enabled" value="0">
                        <input class="form-check-input" type="checkbox" name="enabled" id="enabled" value="1"
                            {{ old('enabled', 0) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="enabled">{{ trans('cruds.post.fields.enabled') }}</label>
                    </div>
                    @if ($errors->has('enabled'))
                        <div class="invalid-feedback">
                            {{ $errors->first('enabled') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.post.fields.enabled_helper') }}</span>
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
            url: '{{ route('admin.posts.storeMedia') }}',
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
            success: function(file, response) {
                $('form').find('input[name="display_image"]').remove()
                $('form').append('<input type="hidden" name="display_image" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="display_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($post) && $post->display_image)
                    var file = {!! json_encode($post->display_image) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="display_image" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '{{ route('admin.posts.storeCKEditorImages') }}',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                    );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                            e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $post->id ?? 0 }}');
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
