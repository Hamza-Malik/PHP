<?php
namespace Ijdb\Controllers;
//require '../../CSY2028/EntryPoint.php';
class CarController
{
    private $carsTable;
    private $manufactureTable;

    public function __construct($carsTable, $manufactureTable)
    {
        $this->carsTable = $carsTable;
        $this->manufactureTable = $manufactureTable;

    }

    public function list_car()
    {
        if (isset($_GET['manufacturerId'])) {
            $manufacturers = $this->manufactureTable->findAll();
            $cars=$this->carsTable->find('manufacturerId',$_GET['manufacturerId']);
            $manufacture_name=$_GET['manufacturername'];
            return ['template' => 'list.html.php',
                'title' => 'Car List',
                'variables' => [
                    'cars' => $cars,'manufacturers'=>$manufacturers,'manufacture_name' =>$manufacture_name
                ]
            ];

        }
            else{
                $cars = $this->carsTable->findAll();
                $manufacturers = $this->manufactureTable->findAll();
                return ['template' => 'list.html.php',
                    'title' => 'Car List',
                    'variables' => [
                        'cars' => $cars, 'manufacturers' => $manufacturers
                    ]
                ];
            }
    }

    public function showImage(){

        if (isset($_GET['show_id'])) {
            $manufacturers = $this->manufactureTable->findAll();

            $cars_image = $this->carsTable->find('id',$_GET['show_id']);

            return ['template' => 'show_image.html.php',
                'title' => 'Car List',
                'variables' => [
                    'car_image' => $cars_image, 'manufacturers' => $manufacturers]

            ];

        }

    }

public function list()
{
    $manufacturers = $this->manufactureTable->findAll();


    if (isset($_GET['show_archive'])) {
        $get="Archive";
        $cars = $this->carsTable->find('archive_car',$get);
        echo "Archivee";

    }
    else {
        $get="Unarchive";
        $cars = $this->carsTable->find('archive_car',$get);

    }
        return ['template' => 'admin_car_list.html.php',
            'title' => 'Car List',
            'variables' => [
                'cars' => $cars, 'manufacturers' => $manufacturers
            ]
        ];

}
	public function delete() {
		$this->carsTable->delete($_POST['id']);

		header('location: /cars');
	}
	public function find($man_id,$man_name) {

		$manufacturers = $this->manufactureTable->findAll();
		$cars=$this->carsTable->find('manufacturerId',$man_id);

		return ['template' => 'list.html.php',
				'title' => 'Car List',
				'variables' => [
						'cars' => $cars,'manufacturers'=>$manufacturers,'mans' =>$man_name
					]
				];
	}

    public function editSubmit()
    {
        if(isset($_POST['car_info'])){
        $varcars = $_POST['car_info'];
        $manufacturers_var = $this->manufactureTable->findAll();
       $varcars['archive_car'] = "Unarchive";

        $this->carsTable->save($varcars);
        require '../database.php';
        $stmt = $pdo->query('SELECT * FROM cars.cars WHERE id = (SELECT MAX(id) FROM cars.cars)');
        foreach ($stmt as $row) {
            $getId = $row['id'];
        }
            mkdir('../public/images/cars/'.$getId,0777);
           for($i=0;$i<count($_FILES['image']['name']);$i++){
               $fileName = $i.'.jpg';
                var_dump("Hamza");
            move_uploaded_file($_FILES['image']['tmp_name'][$i], '../public/images/cars/'.$getId.'/'.$fileName);

       }

        header('location: /cars');
    }
        		else if (isset($_POST['car_archive'])) {

			$cars['id'] = $_POST['archive_car'];
		    $cars['archive_car'] = "Archive";

				$this->carsTable->save($cars);


			header('location: /cars');
		}
                else if (isset($_POST['car_unarchive'])) {

                    $cars['id'] = $_POST['archive_car'];
                    $cars['archive_car'] = "Unarchive";

                    $this->carsTable->save($cars);


                    header('location: /cars');
                }
    }
//
    public function editForm() {
       $manufacturers_var = $this->manufactureTable->findAll();
        if  (isset($_GET['id'])) {
            $result = $this->carsTable->find('id', $_GET['id']);
            $varcars = $result[0];
        }

        else  {
            $varcars=false;
            //$manufacturers_var = false;
        }
        return [
            'template' => 'editcar.html.php',
            'variables' => ['car_var' => $varcars,'manufacturers_var'=>$manufacturers_var],
            'title' => 'Edit Car'
        ];
    }



}
