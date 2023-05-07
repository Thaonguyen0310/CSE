<?php
class Student {
    private $id;
    private $name;
    private $age;

    public function __construct($id, $name, $age) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }
}
class StudentDAO {
    private $students = array();

    public function create($student) {
        array_push($this->students, $student);
    }

    public function read($id) {
        foreach ($this->students as $student) {
            if ($student->getId() == $id) {
                return $student;
            }
        }
        return null;
    }

    public function update($student) {
        for ($i = 0; $i < count($this->students); $i++) {
            if ($this->students[$i]->getId() == $student->getId()) {
                $this->students[$i] = $student;
                return;
            }
        }
    }

    public function delete($id) {
        for ($i = 0; $i < count($this->students); $i++) {
            if ($this->students[$i]->getId() == $id) {
                unset($this->students[$i]);
                $this->students = array_values($this->students);
                return;
            }
        }
    }

    public function getAll() {
        return $this->students;
    }
}
?>