<?php

class User
{
	private $db;
	private $date;
	private $session_name;
	private $isLoggendIn;
	const COOKIE_NAME = 'hash';
    const COOKIE_EXPIRY = 604800;
    const ADMIN_SESSION = 'admin';

	public function __construct($user = null)
    {
		$this->db = Database::getInstance();
		$this->session_name = User::ADMIN_SESSION;
		$this->cookieName = User::COOKIE_NAME;

		if (!$user) {
			if (Session::exists($this->session_name)) {
				$user =  Session::get($this->session_name);//id

				if($this->find($user)) {// залогинен
					$this->isLoggendIn = true;
				} else {
					//logout
				}
			}
			
		} else {
			$this->find($user);
		}
	}
	public function create($fields = [])
    {
		$this ->db->insert('users',$fields);
	}

	public function login ($email = null , $password = null, $remember = false)
    {
		if(!$email && !$password && $this->exists()) {
			Session::put($this->session_name,$this->data()->id);
		} else {
			$user = $this->find($email);		 
			 if ($user) {
			 	if (password_verify($password,$this->data()->password)){
			 	Session::put($this->session_name,$this->data()->id);

			 	if($remember) {

			 		$hash = hash('sha256', uniqid());
			 		

			 		$hashCheck = $this->db->get('user_sessions',['user_id', '=', $this->data()->id]);

			 		if (!$hashCheck->count()) {
			 			$this->db->insert('user_sessions',[
			 				'user_id' => $this->data()->id,
			 				'hash' => $hash
			 			]);

			 		} else {
			 			$hash = $hashCheck->first()->hash;

			 		}

			 		Cookie::put($this->cookieName, $hash, USER::COOKIE_EXPIRY);
			 		
			 	}
			 	return true;
			 		}
				}
			}
		 return false;
		}
	

	public function find($value = null)
    {
		if(is_numeric($value)){
			$this->data = $this->db->get('users', ['id', '=', $value])->first();
		} else {
			$this->data = $this->db->get('users', ['email', '=', $value])->first();
		}
		
		if ($this->data) {
			return true;
		}
		return false;
	}

	public function data() 
	{
		return $this->data;
	}

	public function isLoggendIn()
	{
		return $this->isLoggendIn;
	}
	public function logOut() 
	{
		$this->db->delete('user_session', ['user_id', '=', $this->data()->id]);
		Session::delete($this->session_name);
		Cookie::delete($this->cookieName);
	}

	public function exists()
    {
		return (!empty($this->data())) ? true : false;
	}

	public function update($fields = [], $id = null)
    {
		if(!$id && $this->isLoggendIn()) {
			$id = $this->data()->id;
		}

		$this->db->update('users' , $id, $fields);
	}
	// роли
	public function hasPermissions($key = null)
    {
		$group = $this->db->get('groups', ['id', '=', $this->data()->group_id]);

		if($group->count()) {
			$permissions = $group->first()->permissions;
			$permissions = json_decode($permissions, true);
			if($permissions[$key]) {
				return true;
			}		
		}

		return false;
	}
}