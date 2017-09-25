<?php
	// setcookie($coookieName, $cookiePassword, time() + (86400 * 30), "/" );
  

class LayoutView 
{
  
  public function render($isLoggedIn, $v, DateTimeView $dtv) 
  {
    echo '
    <!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Rosas hemsida</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderLink() . '

          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
              ' . $v->response() . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }

  
  public function renderIsLoggedIn($isLoggedIn) 
  {
    if ($isLoggedIn) 
    {
      return '<h2>Logged in</h2>';
    }
    else 
    {
      return '<h2>Not logged in</h2>';
    }
  }

  private function renderLink() 
  {
    if (isset($_GET['register'])) 
    {
      return '<a href="?">Back to login</a>';
    }
    // else if($isLoggedIn = true)
    // {
    //   return 'HEEJ';
    // }
    else
    {
      return '<a href="?register">Register a new user</a>';
    }
  }
}
