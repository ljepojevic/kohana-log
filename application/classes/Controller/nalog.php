<?php echo defined('SYSPATH') or die('No direct script access.');
class Controller_Nalog extends Controller_Application {

   public function action_login()
   {  
    
    $validation = Validation::factory($this->request->post())
                      ->rule('username', 'not_empty')
                      ->rule('username', 'min_length', array(':value', 2))
                      ->label('username', 'Korisnicko ime')
                      ->rule('password', 'not_empty')
                      ->label('password', 'Lozinka');

      if (Auth::instance()->logged_in()){
         $this->redirect("logged", 302);
      }

      $this->template->content = View::factory('login')
            ->bind('user', $user)
            ->bind('errors', $errors);    
      
      if ($_POST){
          $post = $this->request->post();
             $status = Auth::instance()->login($post['username'], $post['password']);
             if ($validation->check() && $status) {
                $this->redirect("/logged", 302);
             }
             else {
                $errors = $validation->errors("login");

             }  
      }  
   }
   public function action_logout() 
   {
      Auth::instance()->logout();
      $this->redirect("login", 302);
      $content = View::factory('login');    
      $this->template->content = $content;
   }
   public function action_signup() 
   {
		$validation = Validation::factory($this->request->post())
		                  ->rule('username', 'not_empty')
		                  ->rule('username', 'min_length', array(':value', 2))
		                  ->label('username', 'Korisnicko ime')

		                  ->rule('password', 'not_empty')
		                  ->label('password', 'Lozinka')

		                  ->rule('password_confirm', 'not_empty')

		                  ->label('email', 'E-mail')
		                  ->rule('email', 'not_empty');

  
      $this->template->content = View::factory('register');

      if ($_POST) {
          $user = new Model_User;
         $user->values($_POST);
         if ($validation->check()) {
            $user->save();
			$role = ORM::factory('role')->where('name', '=', 'login')->find();
			$user->add('roles', $role);
            $this->redirect("/");
         }
         else {
            $errors = $validation->errors("signup");
            $a = $this->request->post();
            $this->template->content = View::factory('register')
            ->bind('post', $a)
            ->bind('errors', $errors);
         }
      }

   }

}