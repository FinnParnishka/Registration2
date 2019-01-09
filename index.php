<?php require_once "reg.php" ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Регистрация пользователя</title>
	<link rel="shortcut icon" href="#">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./style.css">
	<script src="jquery-3.3.1.min.js"></script>
	<script src="script.js"></script>
</head>
<body>
  <div id="form">
  	<label>Эл.Почта*</label><br>
	<input type="email" name="email" required=""><br>

	<label>Пароль*</label><br>
	<input type="password" name="password" required=""><br>

	<label>Имя*</label><br>
	<input type="text" name="name" required=""><br>

	<label>Фамилия</label><br>
	<input type="text" name="surname"><br>

	<label>Ваша должность</label><br>
	<select id="position" name="position"><br>
		<option value="Бухгалтер" >Бухгалтер</option>
		<option value="Директор" >Директор</option>
	</select><br><br>

	<input type="submit" name="ok" id="ok" ></button>
  </div>

  <div id="t1">
  	<table id="table-users" cellpadding="7" cellspacing="0" class="table1">
  		<tr class="table1">
  			<td class="one">
  				Имя
  			</td>

  			<td class="two">
  				Фамилия
  			</td>

  			<td class="one">
  				Эл.почта
  			</td>

  			<td class="two">
  				Должность
  			</td>
  		</tr>

  		<?php
  			 while(($row = $users->fetch_assoc()) != FALSE) {
        $num++;
        $id = $row['id']; ?>

  		<tr class="table1">
  			<td class="one">
  				<?= $row['name'] ?>
  			</td>

  			<td class="two">
  				<?= $row['surname'] ?>
  			</td>

  			<td class="one">
  				<?= $row['email'] ?>
  			</td>

  			<td class="two">
  				<?= $row['position'] ?>
  			</td>
  		</tr>
  	<?php } ?>

  	</table>
  </div>



<?php 
  	if (isset($_GET['del_id'])) { //проверяем, есть ли гет параметр
    //удаляем строку из таблицы
    $sql = mysqli_query($connect, "DELETE FROM `table2` WHERE `id` = {$_GET['del_id']}");
    if ($sql) {
      echo "<p style='color:red;'>Строка удалена!</p>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
    }
}

  ?>



  <div id="t2">
  	<div id="report">
	<button id="okPrivate1">Подтвердить добавление<img src="ok1.png"></button>
	<button id="saveChanges">Сохранить изменения<img src="edit.png"></button><br>
  	<table  cellpadding="7" cellspacing="0" class="table2">
  		<tr class="table2">
  			<td class="one">
  				Дата:<br>
          <input id="input1" type="text" name="data" class="addClickShow"
          value="<?= isset($_GET['edit_id']) ? $dbString['data'] : date("Y-m-d")?>">
        </td>
  			</td>

  			<td class="two">
  				Приход<br>
  				<input type="text" id="input2" name="coming" class="addClickShow" 
  				value=" <?= isset($_GET['edit_id']) ? $dbString['coming'] : ''; ?>" >
  			</td>

  			<td class="one">
  				Реализовано<br>
  				<input type="text" id="input3" name="realize" class="addClickShow"
  				value=" <?= isset($_GET['edit_id']) ? $dbString['realize'] : ''; ?>">
  			</td>

  			<td class="two" id="opIstableTD">
  				Операции с таблицей<br>
		
  			</td>

  			<td class="oneHide">
  				Начислить зарплату<br>
  				<input type="text" name="salary" class="addClickShow"
  				value=" <?= isset($_GET['edit_id']) ? $dbString['salary'] : ''; ?>">
  			</td>

  			<td class="twoHide">
  				Перечислить подрядчику<br>
  				<input type="text" name="sendContractor" class="addClickShow"
  				value=" <?= isset($_GET['edit_id']) ? $dbString['sendContractor'] :''; ?>">
  			</td>

  			<td class="oneHide">
  				Перечислить генподрядчику<br>
  				<input type="text" name="sendGeneralContractor" class="addClickShow"
  				value=" <?= isset($_GET['edit_id']) ? $dbString['sendGeneralContractor'] : ''; ?>">
  			</td>

  		</tr>

  		<?php
  			 while(($row = $addTable2->fetch_assoc()) != FALSE) {
        $num++;
        $id = $row['id'];
         ?>

  		<tr class="table2">
  			<td class="one">
  				<?= $row['data']; ?>
  			</td>

  			<td class="two">
  				<?= $row['coming'] ?>
  			</td>

  			<td class="one">
  				<?= $row['realize'] ?>
  			</td>

  			<td class="two">
  				<a href="?del_id= <?= $id ?> ">Удалить</a><br>
  				<a class="edit" href="?edit_id= <?= $id ?> ">Редактировать</a>
  			</td>

  			<td class="oneHide">
  				<?= $row['salary'] ?>
  			</td>

  			<td class="twoHide">
  				<?= $row['sendContractor'] ?>
  			</td>

  			<td class="oneHide">
  				<?= $row['sendGeneralContractor'] ?>
  			</td>

  		</tr>
  	<?php } ?>
  	</table>
  	</div>
  </div>

  <?php
  	if (isset($_GET['edit_id'])) : ?>
  	 <input type="text" id="getValue" name="getValue" value="<?= $_GET['edit_id'] ?> ">
  	<?php endif?>

</body>
</html>