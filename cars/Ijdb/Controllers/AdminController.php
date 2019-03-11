<?php
namespace Ijdb\Controllers;
class AdminController {
  private $adminTable;


	public function __construct($adminTable) {
		$this->adminTable = $adminTable;


	}
    public function list() {

        $admin = $this->adminTable->findAll();

        return ['template' => 'admin_list.html.php',
            'title' => 'Admin List',
            'variables' => [
                'admins' => $admin
            ]
        ];
    }

    public function logoutHome() {
	  session_destroy();
        header('location: /login');
    }



	public function verify() {
	    if(isset($_POST['submit'])) {

            $admin_info = $_POST['admin'];

                $admins = $this->adminTable->find('user_name', $admin_info['name']);


            if ($admin_info['pass'] == $admins['0']['user_password']) {
                session_start();
                $_SESSION['admin'] = true;
                $_SESSION['admin_name'] = $admins['0']['user_name'];
                return ['template' => 'admin_index.html.php',
                    'title' => 'Claire\'s Car Admin Main Page',
                    'variables' => []
                ];
            } else {
                return ['template' => 'admin_login.html.php',
                    'title' => 'Admin Login',
                    'variables' => []
                ];
            }
        }

        else{
           // $_SESSION['admin'] = false;
            return ['template' => 'admin_login.html.php',
                'title' => 'Admin Login',
                'variables' => []
            ];
        }
  }

	public function delete() {
		$this->adminTable->delete($_POST['id']);

		header('location: /staff');
	}

    public function editSubmit()
    {
        if(isset($_POST['admin_info'])){
            $varadmins = $_POST['admin_info'];


            $this->adminTable->save($varadmins);


            header('location: /staff');
        }

    }
//
    public function editForm() {
        if  (isset($_GET['id'])) {
            $result = $this->adminTable->find('id', $_GET['id']);
            $varadmins = $result[0];
        }

        else  {
            $varadmins=false;
            //$manufacturers_var = false;
        }
        return [
            'template' => 'edit_admin.html.php',
            'variables' => ['admin_var' => $varadmins],
            'title' => 'Edit Admin'
        ];
    }


}
