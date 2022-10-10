(function ($) {

  var resizeId;

  // Done Resizing
  function doneResizing() {
  }

  // Window load
  $(window).on('load', function () {
  });

  // Menu Items
  function createItem(data, menuDisplay = '', displayAll = false) {

    let htmlBuilder = "";

    console.log(menuDisplay);

    // Lets first create the heading for each option
    if (menuDisplay) {
      htmlBuilder += "<div class='title'><h5>" + $('#menu .buttons .btn#' + menuDisplay + '').text() + "<h5></div>";
    }

    $.each(data.items, function (key, val) {

      // Need to have name or description, price validated internally
      if (val.name || val.description) {
        htmlBuilder += "<div class='menu-item'>";

        if (val.name) {
          htmlBuilder += "<div class='name'>" + val.name + "</div>";
        }

        if (val.description) {
          htmlBuilder += "<div class='description'>" + val.description + "</div>";
        }

        if (val.price) {
          htmlBuilder += "<div class='price'>R " + val.price + "</div>";
        }

        htmlBuilder += "</div>";
      } else {
        htmlBuilder += "<div class='menu-item'>No items available</div>";
      }


    });

    $('#menu-display').append(htmlBuilder);
  }

  function SubmitComplaint(serializedData) {
    // Debugging
    // console.log(serializedData);    

    // Fire off the request to includes/form_data.php
    request = $.ajax({
      url: "includes/form_data.php",
      type: "post",
      data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR) {

      // Get field values/response
      let fieldValues = JSON.parse(response);

      // Debugging
      // console.log(fieldValues);       

      $('#success-message').removeClass('hidden');

      // Set values
      $('#emailAddr-visual').text('Email: ' + fieldValues.email + '');
      $('#name-visual').text('Name: ' + fieldValues.name + '');
      $('#complaint-visual').text('Complaint: ' + fieldValues.complaint + '');


      // Log a message to the console
      console.log("Hooray, it worked!");
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
      // Log the error to the console
      console.error(
        "The following error occurred: " +
        textStatus, errorThrown
      );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {

    });
  }

  // Document ready
  $(function () {

    $('#menu .buttons .btn').on('click', function (e) {

      let menuDisplay = $(this).attr('id');

      if (!menuDisplay) {
        alert('Please choose appropriate menu items.');
        return false;
      }

      // All Items
      if (menuDisplay == 'all') {
        // Lets make sure to display the dividers
        let displayAll = true;

        // Set HTML to empty
        $('#menu-display').html('');

        $('#menu .buttons .btn:not(#' + menuDisplay + ')').each(function () {

          let itemChoose = $(this).attr('id');

          $.getJSON('/restaurant-test/data/' + itemChoose + '.json', function (data) {

            // Check if data exists
            if (!data) {
              alert('Menu does not exist');
              return false;
            } else {

              createItem(data, itemChoose, displayAll);
            }


          });

        });

      } else {
        $.getJSON('/restaurant-test/data/' + menuDisplay + '.json', function (data) {

          // Check if data exists
          if (!data) {
            alert('Menu does not exist');
            return false;
          } else {
            // Set HTML to empty
            $('#menu-display').html('');

            createItem(data, menuDisplay);
          }

        });

      }

    });

    // Variable to hold request
    var request;

    // Form functionality
    $('#contactForm').submit(function (event) {

      // Prevent default posting of form - put here to work in case of errors
      event.preventDefault();

      // Abort any pending request
      if (request) {
        request.abort();
      }

      // setup some local variables
      var $form = $(this);

      // Serialize the data in the form
      var serializedData = $form.serialize();

      // Lets call function as tasked
      SubmitComplaint(serializedData);
    });
  });

  $(document).ajaxStart(function () {
  });

  $(document).ajaxSend(function () {
  });

  $(document).ajaxComplete(function (event, request, settings) {
  });

  $(window).on('resize', function () {
    clearTimeout(resizeId);
    resizeId = setTimeout(doneResizing, 500);
  });

  $(window).scroll(function () {

  });


})(jQuery);
