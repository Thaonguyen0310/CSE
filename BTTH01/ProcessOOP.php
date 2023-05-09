<?php
class Student {
  private $id;
  private $name;
  private $age;
  private $grade;
  
  function __construct($id, $name, $age, $grade) {
    $this->id = $id;
    $this->name = $name;
    $this->age = $age;
    $this->grade = $grade;
  }
  
  public function getId() {
    return $this->id;
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function getAge() {
    return $this->age;
  }
  
  public function getGrade() {
    return $this->grade;
  }
  
  public function setId($id) {
    $this->id = $id;
  }
  
  public function setName($name) {
    $this->name = $name;
  }
  
  public function setAge($age) {
    $this->age = $age;
  }
  
  public function setGrade($grade) {
    $this->grade = $grade;
  }
}

class StudentDAO {
  private $students;
  
  function __construct() {
    $this->students = array();
  }
  
  public function create($student) {
    array_push($this->students, $student);
  }
  
  public function read($id) {
    foreach($this->students as $student) {
      if($student->getId() == $id) {
        return $student;
      }
    }
    return null;
  }
  
  public function update($student) {
    foreach($this->students as &$s) {
      if($s->getId() == $student->getId()) {
        $s = $student;
        return true;
      }
    }
    return false;
  }
  
  public function delete($id) {
    foreach($this->students as $key => $student) {
      if($student->getId() == $id) {
        unset($this->students[$key]);
        return true;
      }
    }
    return false;
  }
  
  public function getAll() {
    return $this->students;
  }
}
?>