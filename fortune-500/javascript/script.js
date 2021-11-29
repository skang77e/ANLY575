$(function () {
  let userId;

  // When trash can icon is clicked
  $("a.delete-user").click(function (event) {
    // prevent default href
    event.preventDefault();

    userId = $(this).data("dialog-id");
    const firstName = $(this).data("first-name");
    const lastName = $(this).data("last-name");
    const email = $(this).data("email");

    // add class to dialog
    $("#deque-dialog").addClass("deque-show-block");
    // remove class to dialog
    $("#deque-dialog").removeClass("deque-hidden");
    // add user id data attribute to dialog
    $("#deque-dialog").attr("data-dialog-id", userId);
    // add user id data attribute to dialog
    $(".deque-dialog-button-submit").attr("data-dialog-id", userId);
    // add focus to delete button
    $("#deque-dialog .deque-dialog-button-submit").focus();
    // add first name, last name, and email to dialog
    $(".first-name").html(firstName);
    $(".last-name").html(lastName);
    $(".email").html("(" + email + ")");
  });

  // When close button or Cancel button from dialog is click
  $(".deque-dialog-button-cancel, .deque-dialog-button-close").click(
    function () {
      // remove class to dialog
      $("#deque-dialog").removeClass("deque-show-block");
      // add class to dialog
      $("#deque-dialog").addClass("deque-hidden");
      // assign user id to variable
      let idInt = userId.match(/\d+/)[0];
      // add focus to trash can icon
      $(`a[href="user-delete.php?id=${idInt}"]`).focus();
    }
  );
});
