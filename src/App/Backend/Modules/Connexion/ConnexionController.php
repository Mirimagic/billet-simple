<?php
namespace App\Backend\Modules\Connexion;

use \OCFram\BackController;
use \OCFram\HTTPRequest;

class ConnexionController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Connexion');

    if ($request->postExists('login'))
    {
      $login = $request->postData('login');
      $password = $request->postData('password');

      if ($login == $this->app->config()->get('login') && $password == $this->app->config()->get('pass'))
      {
        if(isset($_POST['stayConnected']))
        {
          setcookie('connected', 'true', time() + 365*24*3600, '/', null, false, true);
          $this->app->user()->setAuthenticated(true);
          $this->app->httpResponse()->redirect('.');
        } else
        {
          $this->app->user()->setAuthenticated(true);
          $this->app->httpResponse()->redirect('.');
        }
      }
      else
      {
        $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
      }
    }
  }

  public function executeDisconnect()
  {
    setcookie('connected', 'true', 1, '/', null, false, true);

    $this->app->user()->setFlash('Vous êtes déconnecté');

    $this->app->httpResponse()->redirect('.');
  }
}
