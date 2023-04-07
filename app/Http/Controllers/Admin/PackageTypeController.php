<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPackageTypeRequest;
use App\Http\Requests\StorePackageTypeRequest;
use App\Http\Requests\UpdatePackageTypeRequest;
use App\Models\PackageType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PackageTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('package_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packageTypes = PackageType::all();

        return view('admin.packageTypes.index', compact('packageTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('package_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.packageTypes.create');
    }

    public function store(StorePackageTypeRequest $request)
    {
        $packageType = PackageType::create($request->all());

        return redirect()->route('admin.package-types.index');
    }

    public function edit(PackageType $packageType)
    {
        abort_if(Gate::denies('package_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.packageTypes.edit', compact('packageType'));
    }

    public function update(UpdatePackageTypeRequest $request, PackageType $packageType)
    {
        $packageType->update($request->all());

        return redirect()->route('admin.package-types.index');
    }

    public function show(PackageType $packageType)
    {
        abort_if(Gate::denies('package_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.packageTypes.show', compact('packageType'));
    }

    public function destroy(PackageType $packageType)
    {
        abort_if(Gate::denies('package_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $packageType->delete();

        return back();
    }

    public function massDestroy(MassDestroyPackageTypeRequest $request)
    {
        $packageTypes = PackageType::find(request('ids'));

        foreach ($packageTypes as $packageType) {
            $packageType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
