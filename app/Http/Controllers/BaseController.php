<?php

namespace App\Http\Controllers;

use App\Traits\FlashMessages;
use Illuminate\Support\Facades\Log;

class BaseController extends Controller
{
    use FlashMessages;

    /**
     * Redirect to a specific route with a flash message and optional error handling.
     *
     * @param string $route
     * @param string $message
     * @param string $type
     * @param bool $error
     * @param bool $withOldInputWhenError
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function responseRedirect($route, $message, $type = 'info', $error = false, $withOldInputWhenError = false)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();
        if ($error && $withOldInputWhenError) {
            return redirect()->back()->withInput();
        }
        return redirect()->route($route);
    }

    /**
     * Redirect back with a flash message and optional error handling.
     *
     * @param string $message
     * @param string $type
     * @param bool $error
     * @param bool $withOldInputWhenError
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputWhenError = false)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();
        return redirect()->back();
    }


    /**
     * Dynamic Page title
     * 
     * @param $title
     * @param $subTitle
     */
    protected function setPageTitle($title, $subTitle)
    {
        Log::info("Req=BaseController@setPageTitle called");
        view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
    }
}