<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	//
	//  main = Controller main default
	//

	function __construct(){
  	parent::__construct();
  }

	public function index()
	{
		$this->load->view('v_home');
	}

	public function pwgen()
	{
		// mencari nilai COST terbaik
		// $timetarget = 0.05;
		// $cost = 8;
		// do {
		// 	$cost++;
		// 	$start = microtime(true);
		// 	password_hash("testing", PASSWORD_BCRYPT, ['cost' => $cost]);
		// 	$end = microtime(true);
		// 	echo "{$cost}<br><hr>";
		// } while (($end - $start) < $timetarget);
		// selesai mencari $argon2i$v=19$m=1024,t=2,p=2$czZrU3NmSkwyZWFCZzZqcg$4BCXT3Xjj+nwslQZOa8I2rO760hSmVmzCiSQ/8cfcDs

		$a = password_hash('admin', PASSWORD_ARGON2I);
		echo "{$a}<br>";
		$b = password_verify('superadmin', $a);
		echo "{$b}";
		die();
	}

	public function as()
	{
		$a = password_hash('admin', PASSWORD_ARGON2I);
		echo "{$a}<br>";
		$b = password_verify('admin', $a);
		echo "{$b}";
		die('<br><hr><br>');

		?>
		<input type="text" name="pw" value="superadmin">
		<?php
		$password = password_hash( $this->input->post('pw', TRUE), PASSWORD_BCRYPT );
		die($password);
	}



}
