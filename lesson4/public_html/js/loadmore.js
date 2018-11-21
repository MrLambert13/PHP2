$(document).ready(function () {
  //выводим по 2 товара, т.к. 2 уже выведено, то начинаем с позиции 2
  var startFrom = 2;
  //получаем id категории из _GET
  var id = getid('id');
  $("#loadmore").click(function () {
    $.ajax({
      //передаем запрос в loadmore.php
      url: '/shop/loadmore.php',
      method: 'POST',
      //передаем с какой позиции загружать и id
      data: {
        "startFrom": startFrom,
        "id": id,
      },
      success: function (data) {
        data = $.parseJSON(data);
        //если что то получили из БД
        if (data.length > 0) {
          $.each(data, function (idx, elem) {
              //добавляем в DOM
              $("#list").append(
                $('<li />').append(
                  $('<a />').attr('href', '/shop/product.php?id=' + elem.id)
                    .text(elem.name))
              );
            }
          );
          //сдвигаем стартовую позицию
          startFrom += 2;
        } else {
          //если из бд ничено не пришло, то меняем текст кнопки
          $("#loadmore").text('Больше нет');
        }
      }
    });
  });
});

//получаем id из _GET (взято с интернета)
function getid(key) {
  var p = window.location.search;
  p = p.match(new RegExp(key + '=([^&=]+)'));
  return p ? p[1] : false;
}