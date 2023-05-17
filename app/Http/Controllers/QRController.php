<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class QRController extends Controller
{
    public function generateQR(Request $request)
    {
        $user = User::where('hash', $request->hash)->first();
        $hash = $request->input('hash');
        $qrCode = QrCode::size(200)->generate($hash);

        $fullName = '<span style="font-size: 1.2em; font-weight: bold;">' .
            mb_strtoupper($user->Lastname, 'UTF-8') . '<br>' .
            mb_strtoupper($user->Name, 'UTF-8') . '<br>' .
            mb_strtoupper($user->Surename, 'UTF-8') .
            '</span>';

        $fullNameWithPadding = '<div style="padding-top: 10px">' . $fullName . '</div>';

        $qrCode .= '<p>' . $fullNameWithPadding . '</p>';
        return $qrCode;
    }
}
