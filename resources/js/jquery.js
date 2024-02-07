
// Скрыть/показать пароль
$('body').on('click', '.password-control', function () {
  if ($('#password').attr('type') == 'password') {
    $(this).addClass('view');
    $('#password').attr('type', 'text');
  } else {
    $(this).removeClass('view');
    $('#password').attr('type', 'password');
  }
  return false;
});
$('body').on('click', '.password_confirmation-control', function(){
  if ($('#password_confirmation').attr('type') == 'password'){
    $(this).addClass('view');
    $('#password_confirmation').attr('type', 'text');
  } else {
    $(this).removeClass('view');
    $('#password_confirmation').attr('type', 'password');
  }
  return false;
});


// Маска
// Телефон
$("#phone").mask("+7(999) 999-99-99")

// Паспорт
$("#passport_series").mask("9999")
$("#passport_number").mask("999-999")

// Организация
$("#company_inn").mask("99-99-99-99-99?-99",{autoclear: false})
$('#company_kpp').mask('999-999-999');

