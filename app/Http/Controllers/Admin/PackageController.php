<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPackageRequest;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Models\Destination;
use App\Models\Package;
use App\Models\PackageType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PackageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('package_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packages = Package::with(['package_type', 'destination', 'media'])->get();

        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        abort_if(Gate::denies('package_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $package_types = PackageType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Destination::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.packages.create', compact('destinations', 'package_types'));
    }

    public function store(StorePackageRequest $request)
    {
        $package = Package::create($request->all());

        if ($request->input('display_image', false)) {
            $package->addMedia(storage_path('tmp/uploads/' . basename($request->input('display_image'))))->toMediaCollection('display_image');
        }

        foreach ($request->input('slider_images', []) as $file) {
            $package->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('slider_images');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $package->id]);
        }

        return redirect()->route('admin.packages.index');
    }

    public function edit(Package $package)
    {
        abort_if(Gate::denies('package_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $package_types = PackageType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Destination::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $package->load('package_type', 'destination');

        return view('admin.packages.edit', compact('destinations', 'package', 'package_types'));
    }

    public function update(UpdatePackageRequest $request, Package $package)
    {
        $package->update($request->all());

        if ($request->input('display_image', false)) {
            if (! $package->display_image || $request->input('display_image') !== $package->display_image->file_name) {
                if ($package->display_image) {
                    $package->display_image->delete();
                }
                $package->addMedia(storage_path('tmp/uploads/' . basename($request->input('display_image'))))->toMediaCollection('display_image');
            }
        } elseif ($package->display_image) {
            $package->display_image->delete();
        }

        if (count($package->slider_images) > 0) {
            foreach ($package->slider_images as $media) {
                if (! in_array($media->file_name, $request->input('slider_images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $package->slider_images->pluck('file_name')->toArray();
        foreach ($request->input('slider_images', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $package->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('slider_images');
            }
        }

        return redirect()->route('admin.packages.index');
    }

    public function show(Package $package)
    {
        abort_if(Gate::denies('package_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $package->load('package_type', 'destination');

        return view('admin.packages.show', compact('package'));
    }

    public function destroy(Package $package)
    {
        abort_if(Gate::denies('package_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $package->delete();

        return back();
    }

    public function massDestroy(MassDestroyPackageRequest $request)
    {
        $packages = Package::find(request('ids'));

        foreach ($packages as $package) {
            $package->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('package_create') && Gate::denies('package_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Package();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
