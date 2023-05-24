<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

trait ResponseService
{
    public function response($bool, $message)
    {
        return response()->json([
            'success' => $bool,
            'message' => $message
        ]);
    }

    public function custom_role($id)
    {
        if ($id == 1) {
            return 'Super Admin';
        } elseif ($id == 2) {
            return 'Sale';
        } elseif ($id == 3) {
            return 'Designer';
        } elseif ($id == 4) {
            return 'Production';
        } elseif ($id == 5) {
            return 'Shipping';
        }
    }

}
