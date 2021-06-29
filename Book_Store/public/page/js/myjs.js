$(document).ready(function () {
    let origin = window.origin;
    // AJAX ADD CART
    $('a.add-to-cart').click(function () {
        let id = $(this).attr('data-id');
        $.ajax({
            url: origin + '/book-store/' + id + '/add-cart',
            method: 'GET',
            success: function (data) {
                alertify.success('Add book to cart success!');
            },
            error: function (err) {
                alertify.error('Add book to cart fail!');
            }
        });
    });
    // EndAddCart

    // DeleteItems
    $('body').on('click', '.cart_quantity_delete', function (){  // Mỗi lần viết lại JS cần thềm $('body) để tìm lại cả trang.
        let id = $(this).attr('data-id');
        $.ajax({
            url: origin + '/book-store/' + id + '/cart-delete',
            method: 'GET',
            success: function (data) {
                let cart = data;
                let totalPrice = data.totalPrice;
                let headsBook = data.headsBook;
                let html = '';
                if (data === null) {
                    html += '<th class="text-danger" style="text-align: center" colspan="5">No item!</th>';
                }else {
                    $.each(headsBook, function (index, headBook) {
                    html += '<tr>';
                    html += '<td class="cart_product"> <a href=""><img class="img-cart"' +
                        'src="/storage/upload_images/images_book/' + headBook.bookInfo.image + '"' +
                        'alt=""></a></td> ';
                    html += '<td class="cart_description"><h4><a href="">' + headBook.bookInfo.name + '</a></h4></td>';
                    html += '<td class="cart_description">' +
                        '<p>$' + headBook.bookInfo.price + '</p></td>';
                    html += '<td class="cart_quantity"> <div class="cart_quantity_button"> <a class="cart_quantity_up" href=""> + </a>' +
                        '<input  disabled class="cart_quantity_input" type="text" name="quantity"' +
                        'value="' + headBook.quantity + '"' + 'autocomplete="off" size="2"><a class="cart_quantity_down" href=""> - </a></div></td>';
                    html += ' <td class="cart_total"><p class="cart_total_price">$' + headBook['price'] + '</p></td>';
                    html += ' <td class="cart_delete"><a class="cart_quantity_delete" ' + 'data-id="' + headBook.bookInfo.id + '"' + 'href="javascript:"><i class="fa fa-times"></i></a></td>';
                    html += '</tr>';
                });
            };
                $('#table-items').empty();
                $('#table-items').html(html);
                $('#total-quantity-cart').html(data.totalQuantity);
                $('#total-price-cart').html(data.totalPrice);
                alertify.success('Remove book from cart success!');
            },
            error: function (err) {
                alertify.error('Remove book from cart fail!');
            }
        });
    });
    // EndDeleteItems


});

