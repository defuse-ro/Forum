<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        return view('admin.email.index');
    }

    public function update(Request $request)
    {
        $inputs = $request->except(['_token']);

        if(!empty($inputs)){
            foreach ($inputs as $type => $value) {

                if($type == 'mail_mailer'){
                    overWriteEnvFile('MAIL_MAILER',trim($value));
                }

                if($type == 'mail_host'){
                    overWriteEnvFile('MAIL_HOST',trim($value));
                }

                if($type == 'mail_port'){
                    overWriteEnvFile('MAIL_PORT',trim($value));
                }

                if($type == 'mail_username'){
                    overWriteEnvFile('MAIL_USERNAME',trim($value));
                }

                if($type == 'mail_password'){
                    overWriteEnvFile('MAIL_PASSWORD',trim($value));
                }

                if($type == 'mail_encryption'){
                    overWriteEnvFile('MAIL_ENCRYPTION',trim($value));
                }

                if($type == 'mail_from_address'){
                    overWriteEnvFile('MAIL_FROM_ADDRESS',trim($value));
                }

                if($type == 'mail_from_name'){
                    overWriteEnvFile('MAIL_FROM_NAME',trim($value));
                }

            }
        }

        return redirect()->back()->with('success', 'Mail Configuration has been updated Successfully');
    }
}
