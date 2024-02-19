// Скрыть/показать пароль
$('body').on('click', '.password-control', function () {
  var passwordInput = $(this).closest('div').find('input[id*="password"]');
  if (passwordInput.attr('type') == 'password') {
    $(this).addClass('view');
    passwordInput.attr('type', 'text');
  } else {
    $(this).removeClass('view');
    passwordInput.attr('type', 'password');
  }
  return false;
});


// Маска
// Телефон
$("#phone").mask("+7(999) 999-99-99",{autoclear: false})

// Паспорт
$("#passport_series").mask("9999",{autoclear: false})
$("#passport_number").mask("999-999",{autoclear: false})

// Организация
$("#inn").mask("99-99-99-99-99?-99",{autoclear: false})
$('#kpp').mask('999-999-999',{autoclear: false});


