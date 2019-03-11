<?php
namespace Ijdb\Controllers;
class ManufactureController {
	private $ManufactureTable;

	public function __construct($ManufactureTable) {
		$this->ManufactureTable = $ManufactureTable;
	}

	public function list() {

		$manufacturer = $this->ManufactureTable->findAll();

		return ['template' => 'manufacturer_car_list.html.php',
				'title' => 'Manufacture List',
				'variables' => [
				'manufacturers' => $manufacturer
					]
				];
	}

	public function delete() {
		$this->ManufactureTable->delete($_POST['id']);

		header('location: /manufacturers');
	}

	public function find($field,$id) {
		$var_manufacture = $this->ManufactureTable->find($field, $id);

		return $var_manufacture;

	}

    public function editSubmit() {
        $manufacture = $_POST['manufacture_info'];
        $this->ManufactureTable->save($manufacture);
        header('location: /manufacturers');
    }
//
    public function editForm() {
        if  (isset($_GET['id'])) {
            $result = $this->ManufactureTable->find('id', $_GET['id']);
            $manufacturer_vars = $result[0];
        }
        else  {
            $manufacturer_vars = false;
        }
        return [
            'template' => 'editmanufacturer.html.php',
            'variables' => ['manufacturer_var' => $manufacturer_vars],
            'title' => 'Edit Manufacture'
        ];
    }

}
