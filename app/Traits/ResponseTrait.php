<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Symfony\Component\Mime\Part\DataPart;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

trait ResponseTrait {


    /**
     * Formatted similar to JSend:
     * https://github.com/omniti-labs/jsend
     * 
     * With the exception that status will either return 'error' or 'success'.
     * 
     * If the response in an error return an array to cater for multiple errors (validation failures).
     */
    public function formatResponse($status, $payload) 
    {
        $data = [
            'status' => 'error',
            'errors' => ['Not found']
        ];

        if (!$status) {
            if (!$payload) {
                $payload = ['An error occurred, please try again.'];
            }

            if (is_string($payload)) {
                $payload = [$payload];
            }



            $data = [
                'status' => 'error',
                'errors' => $this->flattenErrors($payload),
            ];
        }


        if ($status) {
            $data = [
                'status' => 'success',
                'data' => $payload,
            ];
        }

        return response()->json($data);
    }

    protected function flattenErrors($payload)
    {
        if (is_string($payload)) {
            return $payload;
        }
        
        if (is_array($payload)) {
            return $this->arrayFlatten($payload);
        }

        if (!method_exists($payload, 'getMessageBag')) {
            return $payload;
        }

        return $this->arrayFlatten($payload->getMessageBag()->getMessages());
    }

    protected function arrayFlatten($arr) {
        $return = [];
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                $return = array_merge($return, $this->arrayFlatten($value));
            } else {
                $return[] = $value;
            }
        }
        return $return;
    }  
}
