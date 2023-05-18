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

        return view('qrcode.index', ['qrCode' => $qrCode, 'userName' => [
            "Lastname" => $user->Lastname,
            "Name" => $user->Name,
            "Surename" => $user->Surename
        ]]);
    }
}
