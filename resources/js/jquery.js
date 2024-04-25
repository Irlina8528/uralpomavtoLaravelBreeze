import $ from 'jquery'
window.jQuery = window.$ = $
import 'jquery.maskedinput/src/jquery.maskedinput'

(function () {
  const header = document.querySelector("header");
  window.onscroll = () => {
    if (window.pageYOffset > 1) {
      header.classList.add("header__active");
    } else {
      header.classList.remove("header__active");
    }
  };
})();

// Откытие модального окна если есть ошибки
document.addEventListener('DOMContentLoaded', function () {
  // Проверка наличия ошибок в поле пароля
  var passwordErrors = $("#passwordErrors").text();

  if (passwordErrors) {
    $('#modalDell').modal('show');
  }
});

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

$("#status").on('change', function(){
    if($(this).val() == 8){
        $("#reason").show();
    } else {
        $("#reason").hide();
    }
});

// Маска
// Телефон
$("#phone").mask('+7(999) 999-99-99', { autoclear: false });


// Паспорт
$("#passport_series").mask("9999", { autoclear: false })
$("#passport_number").mask("999-999", { autoclear: false })

// Организация
$("#inn").mask("99-99-99-99-99?-99", { autoclear: false })
$('#kpp').mask('999-999-999', { autoclear: false });

// Транспорт
$('#driver_license_number').mask('99-99 999-999');
$('#state_number').mask('a999aa99?9');



