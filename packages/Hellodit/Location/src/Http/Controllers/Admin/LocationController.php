<?php

namespace Hellodit\Location\Http\Controllers\Admin;

use Hellodit\Location\DataGrids\LocationDataGrind;
use Hellodit\Location\Models\Location;
use Hellodit\Location\Repositories\LocationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Webkul\Partner\DataGrids\PartnerDataGrid;

class LocationController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected LocationRepository $locationRepository
    )
    {
        $this->middleware('admin');

        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(LocationDataGrind::class)->toJson();
        }


        return view($this->_config['view']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view($this->_config['view']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'description' => 'required',
            'status' => 'required|in:draft,publish'
        ]);

        $data = $request->only([
            'image',
            'name',
            'description',
            'status'
        ]);

        $data['slug'] = \Str::slug($request->name,'-').'-'.uniqid();

        $this->locationRepository->create($data);

        return  redirect()->route('admin.location.index')
            ->with('success',
                trans('location::app.admin.create-success'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $location = Location::whereId($id)->firstOrFail();

        return view($this->_config['view'], compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required|in:draft,publish'
        ]);

        $data = $request->only([
            'image',
            'name',
            'description',
            'status'
        ]);

        $data['slug'] = \Str::slug($request->name,'-').'-'.uniqid();

        $this->locationRepository->update($data, $id);
        return  redirect()->route('admin.location.index')
            ->with('success',
                trans('location::app.admin.update-success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {

        $this->locationRepository->delete($id);

        return new JsonResponse([
            'message' => trans('location::app.admin.delete-success'),
        ]);


    }
}
