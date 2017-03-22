$(function () {
    var list = $('#books');

    //Load all books
    function bookList() {
        $.getJSON('./api/books.php', function (print) {
            print.forEach(function (book) {
                var li = $('<li>');
                li.append('<div class="form-group"><div class="title">' + book.name);
                li.append('<button class="delete" class="btn-warning delete">Usuń</button>');
                li.append('<div class="divhide"><p class="autor"></p><p class="description"></p></div></div></div>')
                li.attr("data-id", book.id);
                list.append(li);
            })


        })


        //load description to book after click on title
        $('ol').on("click", '.title', function () {

            var ind = $('.title').index(this)
            var hide = $('div.divhide').eq(ind)
            var id = $(this).parent().parent().attr('data-id')

            $.get("./api/books.php",
                    {id: id},
                    function (data) {
                        var author = JSON.parse(data)[0].author;
                        var description = JSON.parse(data)[0].description;

                        $('.autor').text(author)
                        $('.description').text(description)

                    })
            hide.slideToggle();
        })


        // Get the form.
        var form = $('#ajax-contact');

        // Get the messages div.
        var formMessages = $('#form-messages');


        $(form).submit(function (e) {
            // Stop the browser from submitting the form.
            e.preventDefault();

            // Serialize the form data.
            var formData = $(form).serialize();

            // Submit the form using AJAX.
            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData
            })
                    .done(function (response) {
                        // Make sure that the formMessages div has the 'success' class.
                        $(formMessages).removeClass('error');
                        $(formMessages).addClass('success');

                        // Set the message text.
                        $(formMessages).text(response);

                        // Clear the form.
                        $('#title').val('');
                        $('#author').val('');
                        $('#description').val('');
                    })
                    .fail(function (data) {
                        // Make sure that the formMessages div has the 'error' class.
                        $(formMessages).removeClass('success');
                        $(formMessages).addClass('error');

                        // Set the message text.
                        if (data.responseText !== '') {
                            $(formMessages).text(data.responseText);
                        } else {
                            $(formMessages).text('Oops! An error occured and your message could not be sent.');
                        }
                    });

        });


        $('ol').on("click", '.delete', function () {

            var id = $(this).parent().attr('data-id')

            $.ajax({
                type: 'DELETE',
                url: './api/books.php',
                data: {id: id}
            })
                    .done(function (response) {

                        $(formMessages).text("Książka została usunięta");

                    })

                    .fail(function (data) {
                        $(formMessages).text("Usuwanie książki niepowiodło się");
                    })
            
        })
    }
    bookList()

})