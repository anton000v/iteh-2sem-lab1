<?php
if(isset($_POST['auditorium']))
{

      $teacher_opt = $_POST['teacher'];
      $group_opt = $_POST['group'];

      $id = $_POST['id'];
      $week_day = $_POST['week_day'];
      $lesson_number = $_POST['lesson_number'];
      $auditorium = $_POST['auditorium'];
      $disciple = $_POST['disciple'];
      $type = "Practical";


      require_once 'connect.php'; // подключаем скрипт

            // Create connection
      $conn = new mysqli($host, $user, $password, $database);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "INSERT INTO lesson (ID_Lesson, week_day, lesson_number, auditorium, disciple, type)
      VALUES ('{$id}','{$week_day}', '{$lesson_number}', '{$auditorium}','{$disciple}','{$type}')";
      // echo $sql;
      if ($conn->query($sql) === TRUE) {
          echo "<p>New lesson created successfully</p>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $sql = "INSERT INTO lesson_groups
      VALUES ('{$id}','{$group_opt}')";
      if ($conn->query($sql) === TRUE) {
          echo "<p>Lesson group created successfully</p>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $sql = "INSERT INTO lesson_teacher
      VALUES ('{$group_opt}','{$id}')";
      if ($conn->query($sql) === TRUE) {
          echo "<p>Teacher lesson created successfully</p>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }


      $conn->close();

}
else
{
    echo "Введенные данные некорректны";
}
?>
