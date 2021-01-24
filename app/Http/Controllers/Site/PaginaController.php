<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admin\Pagina;
use function PHPUnit\Framework\isEmpty;

class PaginaController extends Controller {

    public function sobre() {

        $pagina = Pagina::where('tipo','=','sobre')->first();

    	return view('site.sobre',compact('pagina'));

    }

    public function contato() {

    	$pagina = Pagina::where('tipo','=','contato')->first();

    	return view('site.contato',compact('pagina'));
    }

    public function enviarContato(Request $request) {

        $pagina = Pagina::where('tipo','=','contato')->first();
        $email = $pagina->email;

        \Mail::send('emails.contato', ['request'=>$request], function($m) use ($request,$email)
            {
                $m->from($request['email'], $request['fname'], $request['lname']);
                $m->replyTo($request['email']);
                $m->subject($request['subject']);
                $m->to($email, 'Contato do Site');
             //   $m->message($request['message']);
            }
        );
        \Session::flash('mensagem',['msg'=>'Email de Contato Enviado com Sucesso!'
            ,'class'=>'green white-text']);

        if ($request['nmform'] == 'contact_site' )
        {
            return redirect()->route('/');
        }
        else
        {
            return redirect()->route('site.contato');
        }
    }
}

//desativar a configuração de segurança visitando https://www.google.com/settings/security/lesssecureapps .
// var_dump($request);
//        dd(  $request['email'], $request['fname'], $request['lname'], $request['email'],
//        $request['subject'], $request['message']);

//       if(isEmpty($request['subject'])) $m->subject($request['subject']) else  $m->subject("Contato pelo Site");
