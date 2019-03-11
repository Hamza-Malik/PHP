<?php
namespace Ijdb\Controllers;

class ArticleController {
	private $articlesTable;

	public function __construct($articlesTable) {
		$this->articlesTable = $articlesTable;

	}
    public function home(){

        $article[0] = $this->articlesTable->latest(); // to get the latest articles
        return ['template' => 'home.html.php',
            'title' => 'Latest Article',
            'variables' => [
                'articles' => $article[0]
            ]
        ];
    }
	public function list() {

    $article = $this->articlesTable->findAll();

    return ['template' => 'admin_article.html.php',
        'title' => 'Article List',
        'variables' => [
            'articles' => $article
        ]
    ];



	}

	public function delete() {
		$this->articlesTable->delete($_POST['id']);

		header('location: /articles');
	}




    public function editSubmit() {
        $article = $_POST['article_info'];
        $this->articlesTable->save($article);
        require '../database.php';
        $stmt = $pdo->query('SELECT * FROM cars.articles WHERE id = (SELECT MAX(id) FROM cars.articles)');
        foreach ($stmt as $row){
            $getId=  $row['id'];
        }
        if ($_FILES['image']['error'] == 0) {
            $fileName = $getId.'.jpg';

            move_uploaded_file($_FILES['image']['tmp_name'], '../public/images/article/' . $fileName);
        }

        header('location: /articles');
    }

    public function editForm() {
        if  (isset($_GET['id'])) {
            $result = $this->articlesTable->find('id', $_GET['id']);
            $vararticles = $result[0];
        }
        else  {
            $vararticles = false;
        }
        return [
            'template' => 'editarticle.html.php',
            'variables' => ['article_var' => $vararticles],
            'title' => 'Edit Article'
        ];
    }

}
