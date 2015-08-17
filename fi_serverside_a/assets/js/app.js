$(window).ready(function() {
    $('.btn').on('click', function() {
        $.ajax('index.php?json=1&player=o&move=' + ($(this).attr('id'))).then(function(args) {
            var data = jQuery.parseJSON(args);
            for (var i = 0; i < data['moves'].length; i++) {
                if (data['moves'][i] != null) {
                    $('#' + (i)).attr('disabled', '1').addClass(data['moves'][i]);
                }
            }
            $('.time').html(data['time'] + ' sec');
            setTimeout(function() {
                $.ajax('index.php?json=1&player=x').then(function(args) {
                    for (var i = 0; i < data['moves'].length; i++) {
                        if (data['moves'][i] != null) {
                            $('#' + (i)).attr('disabled', '1').addClass(data['moves'][i]);
                        }
                    }
                });
            }, 2000);
        });
    });
});