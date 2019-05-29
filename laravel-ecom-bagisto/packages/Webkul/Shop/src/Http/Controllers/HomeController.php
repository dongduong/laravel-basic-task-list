<?php

namespace Webkul\Shop\Http\Controllers;

use Webkul\Shop\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Webkul\Core\Repositories\SliderRepository as Sliders;

/**
 * Home page controller
 *
 * @author    Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
 class HomeController extends controller
{
    protected $_config;
    protected $sliders;
    protected $current_channel;

    public function __construct(Sliders $s)
    {
        $this->_config = request('_config');
        $this->sliders = $s;

    }

    /**
     * loads the home page for the storefront
     */
    public function index()
    {
        $current_channel = core()->getCurrentChannel();

        $all_sliders = $this->sliders->findWhere(['channel_id' => $current_channel['id']]);

        return view($this->_config['view'])->with('sliderData', $all_sliders->toArray());
    }
}
