<?php

namespace Ijdb\Controllers;

class ContactController {
	private $ContactTable;

	public function __construct($ContactTable) {
		$this->ContactTable = $ContactTable;
	}

    public function about() {
        return ['template' => 'about.html.php',
            'title' => 'About Page',
            'variables' => [

            ]
        ];
    }

    public function clair() {
        return ['template' => 'clairs.html.php',
            'title' => 'About Page',
            'variables' => [

            ]
        ];
    }

	public function list() {
		if(isset($_GET['app'])){
//
//		//	echo "HAmza";
			$contact = $this->ContactTable->find('contact_status',"Approved");
//     $check="Approve";
//
			return ['template' => 'admin_contact.html.php',
					'title' => 'Message List',
					'variables' => [
							'contacts' => $contact
						]
					];
	}
			else{
		$contact = $this->ContactTable->find('contact_status',"Not Approved");
		//$check="Not Approve";


		return ['template' => 'admin_contact.html.php',
				'title' => 'Message List',
				'variables' => [
						'contacts' => $contact
					]
				];
}
	}


	public function edit() {
		 if (isset($_POST['submit_approve'])){
			$contact['id'] = $_POST['contact_id'];
			$contact['contact_status'] = "Approved";
			$contact['contact_admin']=$_POST['contact_admin'];
         //var_dump($_POST['contact_id']);

			$this->ContactTable->save($contact);

			header('location: /message');
		}
		else if (isset($_POST['contact_info'])) {

		 	$contact = $_POST['contact_info'];

		 	$this->ContactTable->save($contact);

			header('location: /contact');
		}
		else{
            return [
                'template' => 'contact.html.php',
                'variables' => [],
                'title' => 'Add Message'
            ];
        }

	}
}
