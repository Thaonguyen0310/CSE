<?php
require_once 'ProcessOOP.php';

$students = new StudentDAO();

$file = fopen("DSSV.txt","r");
while(!feof($file)) {
  $line = fgets($file);
  $data = explode(",", $line);
  $id = trim($data[0]);
  $name = trim($data[1]);
  $age = trim($data[2]);
  $grade = trim($data[3]);
  $student = new Student($id, $name, $age, $grade);
  $students->create($student);
}
fclose($file);

foreach($students->getAll() as $student) {
  echo "ID: " . $student->getId() . "<br>";
  echo "Name: " . $student->getName() . "<br>";
  echo "Age: " . $student->getAge() . "<br>";
  echo "Grade: " . $student->getGrade() . "<br><br>";
}
?>