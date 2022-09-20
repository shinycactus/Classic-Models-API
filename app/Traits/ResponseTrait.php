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
            'error' => ['Not found']
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
                'error' => $payload,
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
}
