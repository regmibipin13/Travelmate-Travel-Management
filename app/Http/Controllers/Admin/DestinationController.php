<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDestinationRequest;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use App\Models\Destination;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DestinationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('destination_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $destinations = Destination::with(['media'])->get();

        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        abort_if(Gate::denies('destination_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.destinations.create');
    }

    public function store(StoreDestinationRequest $request)
    {
        $destination = Destination::create($request->all());

        if ($request->input('image', false)) {
            $destination->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $destination->id]);
        }

        return redirect()->route('admin.destinations.index');
    }

    public function edit(Destination $destination)
    {
        abort_if(Gate::denies('destination_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $destination->update($request->all());

        if ($request->input('image', false)) {
            if (! $destination->image || $request->input('image') !== $destination->image->file_name) {
                if ($destination->image) {
                    $destination->image->delete();
                }
                $destination->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($destination->image) {
            $destination->image->delete();
        }

        return redirect()->route('admin.destinations.index');
    }

    public function show(Destination $destination)
    {
        abort_if(Gate::denies('destination_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.destinations.show', compact('destination'));
    }

    public function destroy(Destination $destination)
    {
        abort_if(Gate::denies('destination_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $destination->delete();

        return back();
    }

    public function massDestroy(MassDestroyDestinationRequest $request)
    {
        $destinations = Destination::find(request('ids'));

        foreach ($destinations as $destination) {
            $destination->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('destination_create') && Gate::denies('destination_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Destination();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
