$(document).ready(function () {
    let origin = window.origin;
    // AJAX ADD CART
    $('body').on('click', '.add-to-cart', function () {
        let id = $(this).attr('data-id');
        $.ajax({
            url: origin + '/cart/' + id + '/add',
            method: 'GET',
            success: function (data) {
                $('span#cart-master-icon').html('(' + data.totalQuantity + ')');
                alertify.success('Add book to cart success!');
            },
            error: function (err) {
                alertify.error('Add book to cart fail!');
            }
        });
    });
    // EndAddCart

    // DeleteItems
    $('body').on('click', '.cart_quantity_delete', function () {  // Mỗi lần viết lại JS cần thềm $('body) để tìm lại cả trang.
        let id = $(this).attr('data-id');
        $.ajax({
            url: origin + '/cart/' + id + '/delete',
            method: 'GET',
            success: function (data) {
                let cart = data;
                let totalPrice = data.totalPrice;
                let totalQuantity = data.totalQuantity;
                $('span#cart-master-icon').html('(' + data.totalQuantity + ')');
                $('tr#cart_delete_' + id).remove();
                $('.total-quantity-cart').html(totalQuantity);
                $('.total-price-cart').html('$ ' + totalPrice);
                $('#total-price-checkout').html('$ ' + totalPrice);
                alertify.success('Remove book from cart success!');
            },
            error: function (err) {
                alertify.error('Remove book from cart fail!');
            }
        });
    });
    // EndDeleteItems

    // cart_quantity_up
    $('a.cart_quantity_up').click(function () {
        let id = $(this).attr('data-id');
        $.ajax({
            url: origin + '/cart/' + id + '/quantity-up',
            method: 'GET',
            success: function (data) {
                let cart = data;
                let totalPrice = cart.totalPrice;
                let totalQuantity = cart.totalQuantity;
                $('#value-quantity-' + id).val(cart.headsBook[id].quantity);
                $('#total-headBook-' + id).html('$ ' + cart.headsBook[id].price);
                $('.total-quantity-cart').html(totalQuantity);
                $('.total-price-cart').html('$ ' + totalPrice);
                $('span#cart-master-icon').html('(' + data.totalQuantity + ')');
                $('#total-price-checkout').html('$ ' + totalPrice);
            },
            error: function (err) {
            }
        });
    });
    //end_up

    // cart_quantity_down
    $('a.cart_quantity_down').click(function () {
        let id = $(this).attr('data-id');
        let inputQuantity = $('input#value-quantity-' + id).val();
        if (inputQuantity > 1) {
            $.ajax({
                url: origin + '/cart/' + id + '/quantity-down',
                method: 'GET',
                success: function (data) {
                    let cart = data;
                    let totalPrice = cart.totalPrice;
                    let totalQuantity = cart.totalQuantity;
                    // if (cart.headsBook[id]) {
                        $('#value-quantity-' + id).val(cart.headsBook[id].quantity);
                        $('#total-headBook-' + id).html('$ ' + cart.headsBook[id].price);
                        $('.total-quantity-cart').html(totalQuantity);
                        $('.total-price-cart').html('$ ' + totalPrice);
                        $('span#cart-master-icon').html('(' + data.totalQuantity + ')');
                        $('#total-price-checkout').html('$ ' + totalPrice);
                    // } else {
                    //     alertify.success('Remove item from the cart success!');
                    //     $('tr#cart_delete_' + id).remove();
                    //     $('.total-quantity-cart').html(totalQuantity);
                    //     $('.total-price-cart').html('$ ' + totalPrice);
                    //     $('span#cart-master-icon').html('(' + data.totalQuantity + ')');
                    // }
                },
                error: function (err) {
                }
            });
        } else {
            if (confirm('Are you sure delete item from cart?')) {
                $.ajax({
                    url: origin + '/cart/' + id + '/quantity-down',
                    method: 'GET',
                    success: function (data) {
                        let cart = data;
                        let totalPrice = cart.totalPrice;
                        let totalQuantity = cart.totalQuantity;
                        alertify.success('Remove item from the cart success!');
                        $('tr#cart_delete_' + id).remove();
                        $('.total-quantity-cart').html(totalQuantity);
                        $('.total-price-cart').html('$ ' + totalPrice);
                        $('span#cart-master-icon').html('(' + data.totalQuantity + ')');
                    },
                    error: function (err) {
                    }
                });
            }
        }
    });
    //end_down

    //FilterByAuthor
    $('body').on('click', 'a.authors-nav-choose', function () {
        let id = $(this).attr('data-id');
        $.ajax({
            url: origin + '/author/' + id + '/filter-by-author',
            method: 'GET',
            success: function (data) {
                let books = data;
                if (data.length) {
                    html = '<div class="features_items"><h2 class="title text-center">Total books</h2>';
                    $.each(books, function (index, book) {
                        html += '<div class="col-sm-4"><div class="product-image-wrapper"><div class="single-products"><div class="productinfo text-center">';
                        html += ' <a href="' + '/books/' + book.id + '/details' + '"><img class="book-list-store" src="/storage/upload_images/images_book/';
                        html += book.image + '" alt=""></a>' + ' <h2>' + book.price + '</h2>' + ' <p>' + book.name + '</p>';
                        html += '<a href="javascript:" class="btn btn-default add-to-cart" data-id="' + '33' + '"><i class="fa fa-shopping-cart"></i>Add to cart</a>';
                        html += '</div></div></div></div>'
                    });
                    html += '</div>';
                    $('div.body-list-book').html(html);
                    alertify.success('Found ' + data.length + ' books!');
                } else {
                    html = '<h2 class=" text-center text-danger">No book!</h2>';
                    $('div.body-list-book').html(html);
                    alertify.error('Not found!');
                }
            },
            error: function (err) {
                alertify.error('No data!');
            }
        });
    });
    //EndFilterAuthor

    //FilterByCategory
    $('body').on('click', 'a.category-nav-choose', function () {
        let id = $(this).attr('data-id');
        $.ajax({
            url: origin + '/category/' + id + '/filter-by-category',
            method: 'GET',
            success: function (data) {
                let books = data;
                if (data.length) {
                    html = '<div class="features_items"><h2 class="title text-center">Total books</h2>';
                    $.each(books, function (index, book) {
                        html += '<div class="col-sm-4"><div class="product-image-wrapper"><div class="single-products"><div class="productinfo text-center">';
                        html += ' <a href="' + '/books/' + book.id + '/details' + '"><img class="book-list-store" src="/storage/upload_images/images_book/';
                        html += book.image + '" alt=""></a>' + ' <h2>' + book.price + '</h2>' + ' <p>' + book.name + '</p>';
                        html += '<a href="javascript:" class="btn btn-default add-to-cart" data-id="' + '33' + '"><i class="fa fa-shopping-cart"></i>Add to cart</a>';
                        html += '</div></div></div></div>'
                    });
                    html += '</div>';
                    $('div.body-list-book').html(html);
                    alertify.success('Found ' + data.length + ' books!');
                } else {
                    html = '<h2 class="text-center text-danger">No book!</h2>';
                    $('div.body-list-book').html(html);
                    alertify.error('Not found!');
                }
            },
            error: function (err) {
                alertify.error('No data!');
            }
        });
    });
    //EndCategory

    //SearchMaster

    $('#search-master').keyup(function () {
        let keyWord = $(this).val();
        $.ajax({
            type: "GET",
            url: origin + '/books/search-page',
            data: {
                search: keyWord
            },
            success: function (data) {
                let books = data;
                html = '<div class="features_items"><h2 class="title text-center">Found ' + books.length + ' books</h2>';
                $.each(books, function (index, book) {
                    html += '<div class="col-sm-4"><div class="product-image-wrapper"><div class="single-products"><div class="productinfo text-center">';
                    html += ' <a href="' + '/books/' + book.id + '/details' + '"><img class="book-list-store" src="/storage/upload_images/images_book/';
                    html += book.image + '" alt=""></a>' + ' <h2>' + book.price + '</h2>' + ' <p>' + book.name + '</p>';
                    html += '<a href="javascript:" class="btn btn-default add-to-cart" data-id="' + '33' + '"><i class="fa fa-shopping-cart"></i>Add to cart</a>';
                    html += '</div></div></div></div>'
                });
                html += '</div>';
                $('div.body-list-book').html(html);
            },
            error: function () {
            }
        });
    });
    //EndSerach


    //InputSlider
    // $('body').on('change', 'input#sl2', function () {
    //     let value = $('input#sl2').data('slider').getValue();
    //     console.log(value);
    // });
    $('#sl2').slider({
        range: true,
        min: 0,
        max: 100,
        values: [1, 30],
        slide: function (event, ui) {
            let min = $(this).val();
            // let max = ui.values[1];
            console.log(min);
        }

    });

    //EndInputSlider


});

