$(document).ready(function() {
    $('.dropdown-toggle').on('click', function() {
      var userId = $(this).attr('id').replace('dropdown_', '');
      var escapedId = userId.replace(/ /g, '\\ '); // Escape the space character with a backslash
      var subrows = $('#subrows_' + escapedId);
  
      console.log($('#subrows_' + userId));
      if (subrows.hasClass('hide')) {
        subrows.removeClass('hide');
      } else {
        subrows.addClass('hide');
      }
    });

    $('#formSelector').on('change', function() {
      var formID = $(this).val();
      var formValue = $(this).find(":selected").text();

      if (formID !== '') {
        // Make an AJAX request to fetch the form data
        $.ajax({
          url: '/users/newUser', 
          type: 'POST',
          data: { formID: formID },
          dataType: 'json',
          success: function(response) {
            if (response.status === 'success') {
              // Update the form container with the fetched form data
              $('#new-form-title').html(formValue); 
              $('#formContainer').html(response.form);
              $('.selectedForm').removeClass('hide');

            } else {
              console.log('Error fetching form data.');
            }
          },
          error: function() {
            console.log('Error with ajax.');
          }
        });
      } else {
        // Clear the form container if no form is selected
        $('#formContainer').empty();
      }
    });

    $(document).on('submit', '#formContainer form', function(e) {
      var formValue = $('#name-control').val(); // Get the username
      var formID = $('#formSelector').find(":selected").val();

      // Add the value to the form data
      $(this).append('<input type="hidden" name="username" value="' + formValue + '">');
      $(this).append('<input type="hidden" name="formid" value="' + formID + '">');

      // Continue with the default form submission
      return true;
    });
    // // Get the button
    // let mybutton = document.getElementById("scrollbtn");

    // // When the user scrolls down 20px from the top of the document, show the button
    // window.onscroll = function() {scrollFunction()};

    // function scrollFunction() {
    //   if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    //     mybutton.style.display = "block";
    //   } else {
    //     mybutton.style.display = "none";
    //   }
    // }

    // // When the user clicks on the button, scroll to the top of the document
    // function ScrollTop() {
    //   document.body.scrollTop = 0;
    //   document.documentElement.scrollTop = 0;
    // }
    var top = $('#scrollbtn');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 50) {
        top.addClass('show');
      } else {
        top.removeClass('show');
      }
    });
    
    top.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '50');
    });
    
    
});