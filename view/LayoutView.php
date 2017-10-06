<?php

class LayoutView 
{
  public function render($isLoggedIn, LoginView $LayoutView, DateTimeView $DateTimeView) 
  {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderLink() . '
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          <br>
          <div class="container">
              ' . $LayoutView->response() . '
              
              ' . $DateTimeView->show() . '
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
    if (isset($_GET['register']) || isset($_GET['?register'])) 
    {
      return '<a href="?">Back to login</a>';
    }
    else
    {
      return '<a href="?register">Register a new user</a>';
    }
  }
}
