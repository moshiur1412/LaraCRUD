<?php

namespace App\Traits;

trait FlashMessages
{
    protected $successMessages = [];
    protected $warningMessages = [];
    protected $errorMessages = [];
    protected $infoMessages = [];

    protected function setFlashMessage($message, $type)
    {
        $model = 'infoMessages';
        switch ($type) {
            case 'success':
                $model = 'successMessages';
                break;
            case 'warning':
                $model = 'warningMessages';
                break;
            case 'error':
                $model = 'errorMessages';
                break;
            case 'info':
                $model = 'infoMessages';
                break;
        }

        if (is_array($message)) {
            foreach ($message as $key => $value) {
                array_push($this->$model, $value);
            }
        } else {
            array_push($this->$model, $message);
        }
    }

    protected function getFlashMessages()
    {
        return [
            'success' => $this->successMessages,
            'warning' => $this->warningMessages,
            'error' => $this->errorMessages,
            'info' => $this->infoMessages,
        ];
    }


    protected function showFlashMessages()
    {
        session()->flash('success', $this->successMessages);
        session()->flash('warning', $this->warningMessages);
        session()->flash('error', $this->errorMessages);
        session()->flash('info', $this->infoMessages);
    }
}