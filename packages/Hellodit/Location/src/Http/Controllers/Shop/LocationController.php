<?php

namespace Hellodit\Location\Http\Controllers\Shop;

use Hellodit\Location\Models\Location;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Webkul\Partner\Models\Partner;

class LocationController extends Controller
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
    public function index()
    {
        return view($this->_config['view']);
    }

    public function detail($slug)
    {
        $admin = auth()->guard('admin')->user();
        if ($admin) {
            $location = Location::whereSlug($slug)->firstOrFail();
        } else {
            $location = Location::whereSlug($slug)
                ->firstOrFail();
        }
        return view($this->_config['view'], compact('location'));
    }
}
