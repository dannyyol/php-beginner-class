<?php 

class Student{
    public $score = 24;
    // method
    function grade($score){
        return $score;
    }
}


$new_student = new Student(); // creating an instance of the class

echo $new_student->grade($new_student->score);