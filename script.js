//Get Course and Student DIVs
const students = document.querySelectorAll(".list-item");
const courses = document.querySelectorAll(".list");

//add listeners to courses
for (let course of courses) {
  //make course a valid drop target
  course.addEventListener("dragover", function (event) {
    event.preventDefault();
  });

  //focus on course
  course.addEventListener("dragenter", function (event) {
    this.classList.add("drop-target-course");
  });

  //remove focus from course
  course.addEventListener("dragleave", function (e) {
    this.classList.remove("drop-target-course");
  });

  //drop student onto course
  course.addEventListener("drop", function (event) {
    //get DOM ID of dragged student
    const studentId = event.dataTransfer.getData("id");
    //get student from DOM
    const student = document.getElementById(studentId);
    //remove student  from source
    student.remove();
    //add student to destination
    this.appendChild(student);
    //remove focus from course
    this.classList.remove("drop-target-course");
  });
}

//add listeners to students
for (let student of students) {
  //set data transfer
  student.addEventListener("dragstart", function (event) {
    event.dataTransfer.setData("id", event.target.id);
  });

  /*
   * The events below relate to:
   * - reordering students within a course
   * - moving student to a position inside another course 
   */

  //make student a valid drop target
  student.addEventListener("dragover", function (event) {
    event.preventDefault();
  });

  //focus on student to be displaced downwards
  student.addEventListener("dragenter", function (event) {
    this.classList.add("drop-target-student");
  });

  //remove focus from student
  student.addEventListener("dragleave", function (e) {
    this.classList.remove("drop-target-student");
  });

  //reorder students within course
  student.addEventListener("drop", function (event) {
    //stop drop event from propagating to course
    event.stopPropagation();
    const thisCourse = this.parentNode;
    //get DOM ID of dragged student
    const newStudentId = event.dataTransfer.getData("id");
    //get student from DOM
    const newStudent = document.getElementById(newStudentId);

    //make sure the user is not dragging a student back onto the same student
    if (newStudentId != this.id) {
      //remove student from source
      newStudent.remove();
      //add student to course, before current highlighted course
      thisCourse.insertBefore(newStudent, this);
    }
    //remove focus from student
    this.classList.remove("drop-target-student");
  });
}

var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("<?php echo $student; ?>");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

