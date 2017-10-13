<?php

class LayoutView 
{
  public function render(LoginModel $model, $view, DateTimeView $DateTimeView) 
  {
    
    $WeekendView = new WeekendView();
    
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Rosas hemsida</title>
        </head>
        <body>
          <h1>Assignment 3</h1>
          ' . $this->renderLink() . '
          ' . $this->renderIsLoggedIn($model->isLoggedIn()) . '
          <br>
          <div class="container">
              ' . $view->response($model) . 
                 $WeekendView->submitButton($model)
               . $DateTimeView->show() . '
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
    else
    {
      return '<a href="?register">Register a new user</a>';
    }
  }

  public function getRegisterView()
  {
  return isset($_GET['register']);
  }
}
