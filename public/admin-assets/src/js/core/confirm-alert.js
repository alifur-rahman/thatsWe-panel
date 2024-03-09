// toaster function--------------------
/**
 * @param {string} status The status should success/error/warning
 * @param {string} message The toaster message
 * @param {string} title The toaster title
 */
function notify(status, message, title) {
  toastr[status](message, title, {
    showMethod: 'slideDown',
    hideMethod: 'slideUp',
    closeButton: true,
    tapToDismiss: false,
    progressBar: true,
    timeOut: 2000,
  });
}
// mail send with sweetalart -----------------------------------
/**
 * @param {string} title The alert title
 * @param {string} message The alert message
 * @param {string} url The ajax url
 * @param {boolean} btn_click The send button click
 */
function send_mail(title, message, url, btn_click = false) {
  Swal.fire({
    title: title,
    text: message,
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    confirmButtonText: 'Send Email',
    showLoaderOnConfirm: true,
    preConfirm: (login) => {
      $(".swal2-html-container").text("We Sending Email, Please Wait.....")
      return fetch(url)
        .then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        })
        .catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
    },
    allowOutsideClick: () => !Swal.isLoading()
  }).then((result) => {
    if (result.isConfirmed) {
      if (result.value.status == false) {
        notify('error', result.value.message, title);
      } else {
        notify('success', result.value.message, title);
      }

    }
  });

  // auto click button
  if (btn_click == true) {
    $(".swal2-confirm").trigger("click");
  }
}
// end toaster function

// confirm alert function 
/**
 * @param {string} title The alert title
 * @param {string} message The alert message
 * @param {string} request_url The ajax url for actions
 * @param {Array} data The post data
 * @param {Array} toaster_title The title of toaster
 * @param {string} datatable The datatable redraw
 * @param {boolean} mail The mail sending or not
 * @param {string} url The ajax url for mail
 */
function confirm_alert(title, message, request_url, data, toaster_title = null, datatable = null, mail = false, url = null, __this = null) {

  Swal.fire({
    icon: 'warning',
    title: title,
    html: message,
    showCancelButton: true,
    customClass: {
      confirmButton: 'btn btn-warning',
      cancelButton: 'btn btn-danger'
    },
    closeOnCancel: false,
    closeOnConfirm: false,
  }).then((willDelete) => {
    if (willDelete.isConfirmed) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      if (data.request_for === 'decline') {
        $("#addNewCard").modal('show');
        $(document).on('click', "#reason-yes, #reason-no", function () {
          data['note'] = $(this).closest('form').find("#reason").val();
          $(this).closest('form').find("#reason").val("");
          $("#addNewCard").modal('hide');
          $.ajax({
            url: request_url,
            method: 'POST',
            dataType: 'json',
            data: data,
            success: function (inner_data) {

              if (inner_data.status === true) {
                if (datatable !== null) {
                  console.log(datatable);
                  datatable.draw();
                }
                notify('success', inner_data.message, (toaster_title == null) ? title : toaster_title);
                if (mail == true) {
                  send_mail('Sending Email', 'We sending mail please wait....', url, true);
                }
              }
              else {
                Swal.fire({
                  icon: 'error',
                  title: 'Password reset failed!',
                  html: inner_data.message,
                  customClass: {
                    confirmButton: 'btn btn-danger'
                  }
                });
              }
            }
          });
        })

      }
      else {
        $.ajax({
          url: request_url,
          method: 'POST',
          dataType: 'json',
          data: data,
          success: function (inner_data) {

            if (inner_data.status === true) {
              if (datatable !== null) {
                console.log(datatable);
                datatable.draw();
              }
              notify('success', inner_data.message, (toaster_title == null) ? title : toaster_title);
              if (mail == true) {
                send_mail('Sending Email', 'We sending mail please wait....', url, true);
              }
            }
            else {
              Swal.fire({
                icon: 'error',
                title: 'Password reset failed!',
                html: inner_data.message,
                customClass: {
                  confirmButton: 'btn btn-danger'
                }
              });
            }
          }
        });
      }

    } else {
      if ($(__this).is(":checked")) {
        $(__this).prop('checked', false);
      }
      else if ($(__this).is(":not(:checked)")) {
        $(__this).prop('checked', true);
      }
    }
  });

}