$(document).ready(function () {
  const addForm = $("#add-form");
  // add form submit event
  addForm.submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: "http://localhost/api/product/create.php",
      type: "POST",
      data: addForm.serialize(),
      success: function (response) {
        console.log(response);
        alert("Data added successfully");
        window.location.href = "/client/a.php";
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  const editForm = $("#edit-form");
  // edit form submit event
  editForm.submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: "http://localhost/api/product/update.php",
      type: "POST",
      data: editForm.serialize(),
      success: function (response) {
        console.log(response);
        alert("Data updated successfully");
        window.location.href = "/client/a.php";
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
  const deleteForm = $("#delete-form");
  // delete form submit event
  deleteForm.submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: "http://localhost/api/product/delete.php",
      type: "POST",
      data: deleteForm.serialize(),
      success: function (response) {
        console.log(response);
        alert("Data deleted successfully");
        window.location.href = "/client/a.php";
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
});
