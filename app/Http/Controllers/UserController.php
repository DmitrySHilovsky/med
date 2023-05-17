<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{


    public function register(Request $request)
    {
        // return response()->json([
        //     'message' => 'User successfully registered'
        // ], 200);
        // сохраняем данные из формы в файл
        // $data = $request->all();
        // $file_name = 'form.txt';

        // $fp = fopen($file_name, 'a');
        // fwrite($fp, json_encode($data) . "\n");
        // fclose($fp);

        $user = new User;
        $user->Lastname = $request->input('name1');
        $user->Name = $request->input('name2');
        $user->Surename = $request->input('name3');
        $user->Email = $request->input('email');
        $user->Phone = $request->input('phone');
        $user->City = $request->input('city');
        $user->Job = $request->input('job');
        $user->Post = $request->input('post');
        $user->Hash = Str::random(18);
        $user->save();

        Mail::send(
            [],
            [],
            function ($message) use ($user) {
                $message->to($user->Email);
                $message->subject('Ваш QR-код');
                $from = [255, 0, 0];
                $to = [
                    0, 0, 255
                ];
                $qrCodeImage = QrCode::format('png')
                    ->size(500)
                    ->margin(2)
                    ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
                    ->generate($user->Hash);

                $message->setBody("Сохраните это изображение у себя на устройстве, при посещении конференции будет необходимо его предоставить на входе");
                $message->attachData($qrCodeImage, 'qr_code.png', [
                    'mime' => 'image/png',
                ]);
            }
        );


        return response()->json([
            'message' => 'User successfully registered'
        ], 201);
    }


    public function validateUser(Request $request)
    {
        $user = User::where('hash', $request->hash)->first();
        if ($user) {
            User::where('ID', '=', $user->ID)
                ->update(
                    [
                        'IsCheck' => '1',
                        'Number_hall' => $request->hall
                    ],

                );

            return response("valid user");
        } else {
            return response("not valid");
        }
    }


    public function Users()
    {
        if ($search = \Request::get('search')) {
            $users = User::where(function ($query) use ($search) {
                $query->where('Name', 'LIKE', "%$search%")
                    ->orWhere('Lastname', 'LIKE', "%$search%")
                    ->orWhere('Email', 'LIKE', "%$search%")
                    ->orWhere('Phone', 'LIKE', "%$search%");
            })->paginate(500);
        } else {
            $users = User::paginate(500); // замените на ваш код получения пользователей
        }
        // $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function getAllUsers()
    {
        return User::all();
    }
}
