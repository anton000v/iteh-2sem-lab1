<?php
if(isset($_POST['auditorium']))
{
      $auditorium = trim($_POST['auditorium']);
      require_once 'connect.php'; // подключаем скрипт

      // подключаемся к серверу
      $link = mysqli_connect($host, $user, $password, $database)
          or die("Ошибка " . mysqli_error($link));

      // выполняем операции с базой данных

      $query ="SELECT week_day, lesson_number,auditorium, disciple, type FROM lesson where auditorium='".$auditorium."'";
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
      if($result)
      {
          // echo "Выполнение запроса прошло успешно";
          while ($row = mysqli_fetch_assoc($result))
          {
             echo "<p>{$row['week_day']},  {$row['lesson_number']} lesson, {$row['auditorium']} auditorium,  {$row['disciple']},  {$row['type']}</p>";
          }
      }
      // закрываем подключение
      mysqli_close($link);

}
else
{
    echo "Введенные данные некорректны";
}
?>
