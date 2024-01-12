<?php

namespace Hellodit\Partner\Http\Controllers\Admin;

use Hellodit\Partner\DataGrids\PartnerDataGrid;
use Hellodit\Partner\Models\Partner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Hellodit\Partner\Repositories\PartnerRepository;

class PartnerController extends Controller
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
        protected PartnerRepository $partnerRepository
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
            return app(PartnerDataGrid::class)->toJson();
        }

        return view('partner::admin.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('partner::admin.create');
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
            'language' => 'required',
            'solution' => 'required',
            'title' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'famille' => 'required',
            'email' => 'required',
            'website' => 'required',
            'description' => 'required',
        ]);

        $data = $request->only([
            'image',
            'language',
            'solution',
            'title',
            'last_name',
            'first_name',
            'telephone',
            'mobile',
            'famille',
            'email',
            'website',
            'description'
        ]);

        $this->partnerRepository->create($data);

        return redirect()->route('admin.partner.index')->with('success',
            trans('partner::app.admin.create-success'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $partner = Partner::whereId($id)->firstOrFail();
        return view('partner::admin.create', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'language' => 'required',
            'solution' => 'required',
            'title' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'famille' => 'required',
            'email' => 'required',
            'website' => 'required',
            'description' => 'required',
        ]);

        $data = $request->only([
            'language',
            'solution',
            'title',
            'last_name',
            'first_name',
            'telephone',
            'mobile',
            'famille',
            'email',
            'website',
            'description'
        ]);

        $this->partnerRepository->update($data, $id);

        return redirect()->route('admin.partner.index')->with('success','Success update partner');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->partnerRepository->delete($id);

        return new JsonResponse([
            'message' => trans('partner::app.admin.delete-success'),
        ]);


    }
}
