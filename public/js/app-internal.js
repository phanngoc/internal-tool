// $(document).on('click', 'a[data-method="delete"]', function() {
// var dataConfirm = $(this).attr('data-confirm');
// if (typeof dataConfirm === 'undefined') {
// dataConfirm = 'Are you sure delete this feature?';
// }
// var token = $(this).attr('data-token');
// var action = $(this).attr('href');
// if (confirm(dataConfirm)) {
// var form =
//     $('<form>', {
//       'method': 'POST',
//       'action': action
//     });
// var tokenInput =
//     $('<input>', {
//       'type': 'hidden',
//       'name': '_token',
//       'value': token
//     });
// var hiddenInput =
//     $('<input>', {
//       'name': '_method',
//       'type': 'hidden',
//       'value': 'delete'
//     });

// form.append(tokenInput, hiddenInput).hide().appendTo('body').submit();
// }
// return false;
// });