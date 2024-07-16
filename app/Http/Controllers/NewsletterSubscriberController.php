<?php

namespace App\Http\Controllers;

use App\Helpers\EmailConfig;
use App\Models\NewsletterSubscriber;
use App\Http\Requests\StoreNewsletterSubscriberRequest;
use App\Http\Requests\UpdateNewsletterSubscriberRequest;
use App\Models\General;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsletterSubscriberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsletterSubscriberRequest $request, NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }

    public function showSubscripciones(){
        
        $subscripciones = NewsletterSubscriber::orderBy('created_at','desc')->get();;
        
        return view('pages.subscripciones.index', compact('subscripciones'));

    }
    public function saveSubscripciones(Request $request){
        
        $data = $request->all() ; 
        $data['nombre'] = $data['full_name'];
        NewsletterSubscriber::create($data);

        // $this->envioCorreoAdmin($data);
        // $this->envioCorreoCliente($data);

        return response()->json(['message'=> 'Suscrito Correctamente']);

    }



    private function envioCorreoAdmin($data)
    {
        $generales = General::first();
        // $name = $data['full_name'];
        $name = 'Administrador';
        $mensaje = 'tienes un nuevo suscriptor - HPI';
        $mail = EmailConfig::config($name, $mensaje);
        $emailadmin = 'diego.martinez.r@tecsup.edu.pe';
        $baseUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/mail';
        $baseUrllink = 'https://' . $_SERVER['HTTP_HOST'] . '/';

        try {
            $mail->addAddress($emailadmin);
            $mail->Body =
                '
          <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mundo web</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
    </style>
  </head>
  <body>
    <main>
      <table
        style="
          width: 600px;
          margin: 0 auto;
          text-align: center;
          background-image: url(' .
                $baseUrl .
                '/fondo.png);
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
        "
      >
        <thead>
          <tr>
            <th
              style="
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                margin: 40px;
                padding: 0 200px;
              "
            >
              <a href="' .
                $baseUrllink .
                '" target="_blank" style="text-align:center" ><img src="' .
                $baseUrl .
                '/logo.png" alt="hpi" /></a>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <p
                style="
                  color: #ffffff;
                  font-weight: 500;
                  font-size: 40px;
                  text-align: center;
                  width: 500px;
                  margin: 0 auto;
                  padding: 20px 0;
                  font-family: Montserrat, sans-serif;
                "
              >
                <span style="display: block">Hola ' .
                $name .
                '</span>
                <span style="display: block">Tienes un nuevo suscriptor</span>
              </p>
            </td>
          </tr>

          <tr>
            <td>
              <a
                target="_blank"
                href="' .
                $baseUrllink .
                '"
                style="
                  text-decoration: none;
                  background-color: #fdfefd;
                  color: #254f9a;
                  padding: 16px 20px;
                  display: inline-flex;
                  justify-content: center;
                  border-radius: 10px;
                  align-items: center;
                  gap: 10px;
                  font-weight: 600;
                  font-family: Montserrat, sans-serif;
                  font-size: 16px;
                  margin-bottom: 350px;
                "
              >
                <span>Visita nuestra web</span>
              </a>
            </td>
          </tr>
          <tr style="margin-top: 300px">
            <td>
              <a
                href="' .
                htmlspecialchars($generales->facebook, ENT_QUOTES, 'UTF-8') .
                '"
                target="_blank"
                style="padding: 0 5px 30px 0; display: inline-block"
              >
                <img src="'.$baseUrl .'/facebook.png" alt="facebook"
              /></a>

              <a
                href="' .
                htmlspecialchars($generales->instagram, ENT_QUOTES, 'UTF-8') .
                '"
                target="_blank"
                style="padding: 0 5px 30px 0; display: inline-block"
              >
                <img src="'.$baseUrl .'/instagram.png" alt="instagram"
              /></a>

              <a
                href="' .
                htmlspecialchars($generales->twitter, ENT_QUOTES, 'UTF-8') .
                '"
                target="_blank"
                style="padding: 0 5px 30px 0; display: inline-block"
              >
                <img src="'.$baseUrl .'/twitter.png" alt="twitter"
              /></a>

              <a
                href="' .
                htmlspecialchars($generales->linkedin, ENT_QUOTES, 'UTF-8') .
                '"
                target="_blank"
                style="padding: 0 5px 30px 0; display: inline-block"
              >
                <img src="'.$baseUrl .'/linkedin.png" alt="linkedin"
              /></a>

              <a
                href="' .
                htmlspecialchars($generales->youtube, ENT_QUOTES, 'UTF-8') .
                '"
                target="_blank"
                style="padding: 0 5px 30px 0; display: inline-block"
              >
                <img src=" '.$baseUrl .'/youtube.png" alt="youtube"
              /></a>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </body>
</html>

        
';

            $mail->isHTML(true);
            $mail->send();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }



    private function envioCorreoCliente($data)
    { 
        $generales = General::first();
        // $name = $data['full_name'];
        $name = 'Suscriptor';
        $mensaje = 'Gracias por suscribirte - HPI';
        $mail = EmailConfig::config($name, $mensaje);
        $baseUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/mail';
        $baseUrllink = 'https://' . $_SERVER['HTTP_HOST'] . '/';

        try {
            $mail->addAddress($data['email']);
            $mail->Body =
                '
              <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dimensión Lider</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
    </style>
  </head>
  <body>
    <main>
      <table
        style="
          width: 600px;
          margin: 0 auto;
          text-align: center;
          background-image: url(' .
                $baseUrl .
                '/fondo.png);
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
        "
      >
        <thead>
          <tr>
            <th
              style="
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                margin: 40px;
                padding: 0 200px;
              "
            >
                <a href="' .
                $baseUrllink .
                '" target="_blank" style="text-align:center" ><img src="' .
                $baseUrl .
                '/logo.png" alt="hpi" /></a>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <p
                style="
                  color: #ffffff;
                  font-weight: 500;
                  font-size: 18px;
                  text-align: center;
                  width: 500px;
                  margin: 0 auto;
                  padding: 20px 0;
                  font-family: Montserrat, sans-serif;
                "
              >
                <span style="display: block">Hola </span>
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <p
                style="
                  color: #ffffff;
                  font-size: 40px;
                  line-height: 20px;
                  font-family: Montserrat, sans-serif;
                "
              >
                ' .
                $name .
                '
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <p
                style="
                  color: #ffffff;
                  font-size: 40px;
                  line-height: 70px;
                  font-family: Montserrat, sans-serif;
                  font-weight: bold;
                "
              >
                ¡Gracias
                <span style="color: #ffffff">por suscribirte!</span>
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <p
                style="
                  color: #ffffff;
                  font-weight: 500;
                  font-size: 18px;
                  text-align: center;
                  width: 500px;
                  margin: 0 auto;
                  padding: 20px 0;
                  font-family: Montserrat, sans-serif;
                "
              >
                Mantente enterado de nuestras promociones y ofertas.
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <a
                 target="_blank"
                href="' .
                $baseUrllink .
                '"
                style="
                  text-decoration: none;
                  background-color: #fdfefd;
                  color: #254f9a;
                  padding: 16px 20px;
                  display: inline-flex;
                  justify-content: center;
                  border-radius: 10px;
                  align-items: center;
                  gap: 10px;
                  font-weight: 600;
                  font-family: Montserrat, sans-serif;
                  font-size: 16px;
                  margin-bottom: 350px;
                "
              >
                <span>Visita nuestra web</span>
              </a>
            </td>
          </tr>
          <tr>
            <td>
              <a
                href="' .
                htmlspecialchars($generales->facebook, ENT_QUOTES, 'UTF-8') .
                '"
                target="_blank"
                style="padding: 0 5px 30px 0; display: inline-block"
              >
                <img src="'.$baseUrl .'/facebook.png" alt="facebook"
              /></a>

              <a
                href="' .
                htmlspecialchars($generales->instagram, ENT_QUOTES, 'UTF-8') .
                '"
                target="_blank"
                style="padding: 0 5px 30px 0; display: inline-block"
              >
                <img src="'.$baseUrl .'/instagram.png" alt="instagram"
              /></a>

              <a
                href="' .
                htmlspecialchars($generales->twitter, ENT_QUOTES, 'UTF-8') .
                '"
                target="_blank"
                style="padding: 0 5px 30px 0; display: inline-block"
              >
                <img src="'.$baseUrl .'/twitter.png" alt="twitter"
              /></a>

              <a
                href="' .
                htmlspecialchars($generales->linkedin, ENT_QUOTES, 'UTF-8') .
                '"
                target="_blank"
                style="padding: 0 5px 30px 0; display: inline-block"
              >
                <img src="'.$baseUrl .'/linkedin.png" alt="linkedin"
              /></a>

              <a
                href="' .
                htmlspecialchars($generales->youtube, ENT_QUOTES, 'UTF-8') .
                '"
                target="_blank"
                style="padding: 0 5px 30px 0; display: inline-block"
              >
                <img src=" '.$baseUrl .'/youtube.png" alt="youtube"
              /></a>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </body>
</html>

            ';
            $mail->isHTML(true);
            $mail->send();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    
}
