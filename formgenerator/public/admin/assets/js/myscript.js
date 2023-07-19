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
      var csrfName = $('#csrfToken').attr('name'); // CSRF Token name
      var csrfHash = $('#csrfToken').val(); // CSRF hash

      if (formID !== '') {
        // Make an AJAX request to fetch the form data
        $.ajax({
          url: '/users/newUser', 
          type: 'POST',
          data: { 
            formID: formID,
            [csrfName]: csrfHash 
          },
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

      if (formID === null || formID === "") {
        formID = $('#edit_formid').val();
      }

      // Add the value to the form data
      $(this).append('<input type="hidden" name="username" value="' + formValue + '">');
      $(this).append('<input type="hidden" name="formid" value="' + formID + '">');

      // Continue with the default form submission
      return true;
    });

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
    
    //For Form Template
    $('#NewFormSelector').on('change', function() {
      var filename = $(this).find(":selected").text();

      $.ajax({
        url: '/template/getFormHTML', 
        type: 'GET',
        data: { filename : filename },
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success') {

            $('#formHMTL').val(response.data);
            $('#form_preview').removeClass('hide');

          } else {
            console.log('Error fetching form data.');
          }
        },
        error: function() {
          console.log('Error with ajax.');
        }
      });

    });

    $('#form_preview').click(function(event) {
      //Prevent Form Submission
      event.preventDefault();

      //Get Form Data
      var form = $('#formHMTL').val();

      if(form !== ''){
        // Make AJAX request
        $.ajax({
          url: '/template/print', 
          type: 'GET',
          data: { form : form },
          dataType: 'json',
          success: function(response) {
            if (response.status === 'success') {
      
                var pdfContent = response.pdfContent;
                
                // Create a new window
                var newWindow = window.open('', '_blank');

                // Write the PDF content to the new window document
                newWindow.document.write('<iframe width="100%" height="100%" src="data:application/pdf;base64,' + pdfContent + '"></iframe>');

                // Close the document write operation
                newWindow.document.close();
                
            } else {
              console.log('Error fetching form data.');
            }
          },
          error: function() {
            console.log('Error with ajax.');
          }
        });
      }

    });

});