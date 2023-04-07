<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPackagePlanRequest;
use App\Http\Requests\StorePackagePlanRequest;
use App\Http\Requests\UpdatePackagePlanRequest;
use App\Models\Package;
use App\Models\PackagePlan;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PackagePlanController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('package_plan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packagePlans = PackagePlan::with(['package'])->get();

        return view('admin.packagePlans.index', compact('packagePlans'));
    }

    public function create()
    {
        abort_if(Gate::denies('package_plan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packages = Package::pluck('package_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.packagePlans.create', compact('packages'));
    }

    public function store(StorePackagePlanRequest $request)
    {
        $packagePlan = PackagePlan::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $packagePlan->id]);
        }

        return redirect()->route('admin.package-plans.index');
    }

    public function edit(PackagePlan $packagePlan)
    {
        abort_if(Gate::denies('package_plan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packages = Package::pluck('package_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $packagePlan->load('package');

        return view('admin.packagePlans.edit', compact('packagePlan', 'packages'));
    }

    public function update(UpdatePackagePlanRequest $request, PackagePlan $packagePlan)
    {
        $packagePlan->update($request->all());

        return redirect()->route('admin.package-plans.index');
    }

    public function show(PackagePlan $packagePlan)
    {
        abort_if(Gate::denies('package_plan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packagePlan->load('package');

        return view('admin.packagePlans.show', compact('packagePlan'));
    }

    public function destroy(PackagePlan $packagePlan)
    {
        abort_if(Gate::denies('package_plan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packagePlan->delete();

        return back();
    }

    public function massDestroy(MassDestroyPackagePlanRequest $request)
    {
        $packagePlans = PackagePlan::find(request('ids'));

        foreach ($packagePlans as $packagePlan) {
            $packagePlan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('package_plan_create') && Gate::denies('package_plan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PackagePlan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
