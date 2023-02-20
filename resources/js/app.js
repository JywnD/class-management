require('./bootstrap');

$(document).ready(function () {
  varIsEditCourse = false;

  $('#edit-course-button').on('click', function () {
    $('#normal-table').css("display", "none");
    $('#is-edit-table').css("display", "table");
    $('#save-course-button').css("display", "inline-block");
  });

  $('#save-course-button').on('click', function () {
    $('#normal-table').css("display", "table");
    $('#is-edit-table').css("display", "none");
    $('#save-course-button').css("display", "none");

    document.getElementById('edit-course-form').submit();
  });
});
