<?php

namespace Hellodit\Partner\Http\Controllers\Shop;

use Hellodit\Partner\Models\Partner;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PartnerController extends Controller
{
    use DispatchesJobs, ValidatesRequests;

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
    public function __construct()
    {
        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index($id)
    {
        $partners = Partner::all();
        return view($this->_config['view'], compact('partners'));
    }

    public function detail($id)
    {
        $partner = Partner::whereId($id)->with('address')->firstOrFail();
        return view($this->_config['view'], compact('partner'));
    }


}
