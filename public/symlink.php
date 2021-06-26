<?php
/**
* This is an insecure way to execut, make sure you're sure about your server security and proper permissions set up or else this can be very harmfull !!
*/

// .env
CUSTOM_ARTISAN=1


// routes/web.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

// route/web.php

Route::get('/m-artisan', function () {
    if( env('CUSTOM_ARTISAN') ){
        echo "<form method=post>";
        echo "<input type='hidden' name='_token' value='" . csrf_token() . "' />";
        echo "<input type='text' name='command' placeholder='Write your artisan command here' />";
        echo "<button>Execute</button>";
        echo "</form>";
        return 'write command without php artisan.';
    }else{
        return "Naaah... Not Allowed !!";
    }

});
Route::post('/m-artisan', function (Request $request) {
    if (env('CUSTOM_ARTISAN')) {
        echo "<form method=post>";
        echo "<input type='hidden' name='_token' value='" . csrf_token() . "' />";
        echo "<input type='text' name='command' value='".$request->command."' placeholder='writ your artisan command here' />";
        echo "<button>Execute</button>";
        echo "</form>";
        try {
            Artisan::call('inspire');
            dump(Artisan::output());
        } catch (\Throwable $th) {
            echo "Error : ".$th->getMessage();
        }
    }else{
        return 'Naaah... Not Allowed !!';
    }
    return 'Command executed';
});
