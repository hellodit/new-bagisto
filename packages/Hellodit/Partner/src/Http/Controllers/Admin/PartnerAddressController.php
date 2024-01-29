<?php

namespace Hellodit\Partner\Http\Controllers\Admin;

use Hellodit\Partner\DataGrids\PartnerAddressDataGrid;
use Hellodit\Partner\Models\PartnerAddress;
use Hellodit\Partner\Repositories\PartnerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PartnerAddressController extends Controller
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
            return app(PartnerAddressDataGrid::class)->toJson();
        }

        return view('partner::admin.address.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('partner::admin.address.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'partner_id' => 'required',
            'company' => 'required',
            'company_id' => 'required',
            'street' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'country' => 'required',
            'state' => 'required',
        ]);

        $data = $request->only([
            'partner_id',
            'company',
            'company_id',
            'street',
            'zip_code',
            'city',
            'country',
            'state',
            'location_id',
            'telephone',
            'mobile',
            'email',
        ]);

        PartnerAddress::create($data);

        return redirect()->route('admin.partner_address.index')->with('success',
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
        return view($this->_config['view']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $partner_address = PartnerAddress::whereId($id)->firstOrfail();
        $partner_address->delete();

        return new JsonResponse([
            'message' => trans('partner::app.admin.delete-success'),
        ]);


    }
}
