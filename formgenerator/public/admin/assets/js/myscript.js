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
  });