$(window).ready(function() {
    var running = false;
    reset();

    $('.btn-start').on('click', function() {
       $('#start').hide();
        running = true;
        movement();
        return false;
    });

    var num = 1;
    var runner_left = 0;
    var stop_running = false;
    var last_jump = 0;

    setObstacles();

    $('#restartButton').on('click', function() {
        reset();
        stop_running = false;
    });

    function movement() {
        var movement = setInterval(function() {
            // If the runner should be running or not.
            if (running) {
                // Scroll the browser automatically.
                $(window).scrollLeft($(window).scrollLeft() + 20);

                var runner_position = $('#runner').offset().left;

                if (runner_position >= 500) {
                    $('#amazon').show('fast');
                }

                if (runner_position >= 400) {
                    $('#amazon').show('fast');
                    $('#amazonPanel').show('fast');
                }

                if (runner_position >= 1000) {
                    $('#bahia').show('fast');
                    $('#bahiaPanel').show('fast');
                }

                if (runner_position >= 1800) {
                    $('#parana').show('fast');
                    $('#paranaPanel').show('fast');
                }

                if (runner_position >= 2900) {
                    $('#saopaulo').show('fast');
                    $('#saopauloPanel').show('fast');
                }

                if (runner_position >= 3600) {
                    $('#rio').show('fast');
                    $('#rioPanel').show('fast');
                }


                if ($(window).scrollLeft() >= $(document).width() - $(window).width() - 500 && !stop_running) {
                    $('#runner').css('left', runner_left = runner_left + 50);
                }

                if (runner_position > $(document).width() - 900) {
                    stop_running = true;

                    /** LOL! */
                    $('#runner').css('left', runner_left = runner_left + 100);
                    var margin_top = -50;
                    $('#runner').css('margin-top', margin_top = margin_top - 70);
                    $('#runner').css('left', runner_left = runner_left + 100);
                    $('#runner').css('margin-top', margin_top = margin_top -20);
                    $('#runner').css('left', runner_left = runner_left + 50);
                    $('#runner').css('margin-top', margin_top);
                    $('#runner').css('left', runner_left = runner_left + 10);

                    clearInterval(movement);
                    setTimeout(function() {
                        $('#end').show();
                    }, 500);
                }

                // Create running effect for the runner.

                if (!$('#runner').hasClass('jump')) {
                    var image = "url('imgs/runner_" + num + ".png')";
                    $('#runner').css('background-image', image);
                    num++;
                    // If maximum amount of animated pictures has been reached, reset the animation.
                    if (num > 4) {
                        num = 1;
                    }
                }
            }
        }, 85);
    }


    var line = 1;
    $(window).on('keydown', function(event) {
        // Make runner jump.
        if (event.keyCode == 32) {
            if (!$('#runner').hasClass('jump')) {
                $('#runner').effect('bounce', {direction: 'up', times: 1}, 500);
                $('#runner').addClass('jump');
                setTimeout(function () {
                    $('#runner').removeClass('jump');
                }, 300)
            }
        }

        // Move runner between 1-3 lines.
        if (event.keyCode == 38) {
            if (line != 0) {
                removeRunnerClasses();
                line = line - 1;
                $('#runner').addClass('line-' + line);
            }
        }
        if (event.keyCode == 40) {
            if (line != 2) {
                removeRunnerClasses();
                line = line + 1;
                $('#runner').addClass('line-' + line);
            }
        }
    });
});

/**
 * Resets the game.
 */
function reset() {
    $('.animation').each(function() {
        $(this).hide();
    });
    $('.panel').each(function() {
        $(this).hide();
    });

    $(window).scrollLeft(0);
    $('#runner').removeAttr('style');
}

/**
 * Removes all the line classes from the runner.
 */
 function removeRunnerClasses() {
    for (var i = 0; i < 3; i++) {
        $('#runner').removeClass('line-' + i);
    }
}

function setObstacles() {
    $('.obstacle').each(function() {
        $(this).remove();
    });

    for (i = 0; i < 4; i++) {
        var left = Math.floor((Math.random() * 4000) + 1);
        $('#runway' + i).append('<span id="obstacle-' + i + '-1" class="obstacle"></span>');
        $('#obstacle-' + i + '1').css('left', left);

        var left = Math.floor((Math.random() * 4000) + 1);
        $('#runway' + i).append('<span id="obstacle-' + i + '-2" class="obstacle"></span>');
        $('#obstacle-' + i + '-2').css('left', left);
    }
}