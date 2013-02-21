$(function() {
    $("a.embed").each(function() {
        var $link = $(this);

        $.ajax({
            url: $link.attr('href'),
            dataType: 'jsonp',
            error: function(xhr, status, error) {
                alert(error);
            },
            success: function(response) {

                var code = $('<pre>')
                    .addClass('prettyprint')
                    .text(response.data);

                $link.replaceWith(code);
                prettyPrint();
            }
        });
    });
});
