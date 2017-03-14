<?php 
 ini_set('display_errors',1);

/* PDO */

$pdo=new PDO('mysql:host=localhost;dbname=livres','root','chuvanan');

$req = $pdo->prepare("SELECT * FROM livre");
$req->execute();
$livres = $req->fetchAll(PDO::FETCH_ASSOC);
var_dump($livres);

 require_once __DIR__ .'/vendor/autoload.php'; /* De include autoload, su dung cac classe, __DIR__ se la Ontwig */
 
$loader = new Twig_Loader_Filesystem (__DIR__ . '/templates');
$twig= new Twig_Environment ($loader);


$page= isset( $_GET['page']) ? $_GET['page'] :null; // neu khong co trang nao thi se la null, tra ve index.html

switch ($page) {
	case 'apropos':
		echo $twig->render('pages/apropos.html.twig', array('name' => 'Nhat'));
		break;
	case 'contact':
		echo $twig->render('pages/contact.html.twig');
		break;
	case 'livres':
		echo $twig->render('pages/livres.html.twig',['livres'=>$livres]);
		break;
	default:
		echo $twig->render('pages/index.html.twig');
		break;
}





 ?>