<?php 
$post=$_POST;
$name=$post['name'];
$email=$post['email'];
$surname=$post['surname'];
$password=$post['password'];
$position=$post['position'];//переменные из формы регистрации
$data=$post['data'];

$coming=$post['coming'];
$realize=$post['realize'];
$salary=$post['salary'];
$sendContractor=$post['sendContractor'];
$sendGeneralContractor=$post['sendGeneralContractor']; // переменные из формы2 зарплата.
$getId=$post['getId'];






$connect = mysqli_connect("127.0.0.1", "root", "123", "reg");

if ($connect==false) {
	echo "Ошибка подключения БД";
	die();
}


  $users = $connect->query("SELECT * FROM table1");
   $num = 0; //Далее цикл в файле index.php 

if (isset($post['email'])) {
      $add1 = $connect->query("INSERT INTO table1 (id, name, surname, email,password, position) VALUES  (NULL, '$name', '$surname', '$email', '$password', '$position')");
}

	$addTable2=$connect->query("SELECT * FROM table2");

if (isset($_POST['coming'])) {

	if ( isset($getId) ) {
         $sql = mysqli_query($connect, "UPDATE table2 SET data = '$data', coming = '$coming', realize = '$realize', salary = '$salary', sendContractor = '$sendContractor', sendGeneralContractor = '$sendGeneralContractor' 
          	WHERE id= '$getId' ");
    } else {
	  $add2 = $connect->query("INSERT INTO table2 (id, data, coming, realize, salary, sendContractor, sendGeneralContractor) VALUES  (NULL, '$data', '$coming', '$realize','$salary', '$sendContractor', '$sendGeneralContractor')");
	}
} 

if (isset($_GET['edit_id'])) {
      $sql = mysqli_query($connect, "SELECT id, data, coming, realize, salary, sendContractor, sendGeneralContractor
      	FROM table2 WHERE id = {$_GET['edit_id']}");
      $dbString = mysqli_fetch_array($sql);
}
