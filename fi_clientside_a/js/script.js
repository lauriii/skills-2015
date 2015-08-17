$(window).ready(function() {
    $('#end').hide();

    var canvas = new CanvasState(document.getElementById('puzzle'));

    var image = null;
    $('#file').on('change', function() {
        var file = this.files[0];
        var file_reader = new FileReader();
        file_reader.readAsDataURL(file);
        file_reader.onload = function() {
            $('.preview').html('<img src="' + file_reader.result + '"/>');
            image = new Image();
            image.src = file_reader.result;
        }
    });

    $('#start-form').submit(function() {
        if ($('#name').val().length && image) {
            $('#start').hide();
            $('#playername').html($('#name').val());
            canvas.difficulty = $('#difficult').val();
            canvas.setImage(image);
        }
        else {
            alert('Please fill all form elements.');
        }

        var time = 0;
        var pause = false;
        setInterval(function() {
            if (!pause) {
                time++;
                var time_print;
                if (time < 10) {
                    time_print = '00:0' + time;
                }
                else if (time < 60) {
                    time_print = '00:' + time;
                }
                else if ((time) < 60 * 10) {
                    var minutes = Math.round(time / 60);
                    if (minutes > 10) {
                        minutes = '0' + minutes;
                    }
                    var seconds = time - (minutes * 60);
                    if (seconds < 10) {
                        seconds = '0' + seconds;
                    }
                    time_print = minutes + ':' + seconds;
                }
                $('#timer').html(time_print);
            }
        }, 1000);

        return false;
    });



    $('#pause').on('click', function() {
        if (!pause) {
            pause = true;
            $(this).html('START');
        }
        else {
            pause = false;
            $(this).html('PAUSE');
        }
    });

    $('#restart').on('click', function() {
        $('#end').show();
    });
});

/**
 * The canvas state.
 *
 * @param canvas
 * @constructor
 */
var CanvasState = function(canvas) {
    this.canvas = canvas;
    this.context = this.canvas.getContext('2d');
    this.pieces = [];
    this.image = false;
    this.difficulty = 2;
    this.width = 500;
    this.height = 500;
    this.piece_width = 0;
    this.piece_height = 0;
    this.mouse = null;
    this.selected = null;

    var my_state = this;

    $(this.canvas).on('mousedown', function(event) {
        var mouse = my_state.getMouse(event);
        my_state.resetSelection();
        var selected_piece = my_state.getPieceUnderMouse(mouse);
        my_state.selected = selected_piece;
        my_state.mouse = mouse;
        selected_piece.selected = true;
    });

    $(this.canvas).on('mousemove', function(event) {
        my_state.mouse = my_state.getMouse(event);
        my_state.drawPieces();
    });

    $(this.canvas).on('mouseup', function(event) {
        my_state.resetSelection();
        var mouse = my_state.getMouse(event);
        if (my_state.isOnRightPlace(my_state.selected, mouse)) {
            my_state.selected.x = my_state.selected.ox + my_state.width + 134;
            my_state.selected.y = my_state.selected.oy;
            my_state.drawPieces();
            my_state.selected = null;
        }

        my_state.mouse = null;
        my_state.selected = null;
    });

};

/**
 * Draws one piece.
 *
 * @param piece
 */
CanvasState.prototype.drawPiece = function(piece) {
    this.context.drawImage(this.image, piece.ox, piece.oy, this.piece_width, this.piece_height, piece.x, piece.y, this.piece_width, this.piece_height);
};

/**
 * Resets selected piece.
 */
CanvasState.prototype.resetSelection = function() {
    for (var i = 0; i < this.pieces.length; i++) {
        this.pieces[i].selected = false;
    }
}

/**
 * Creates the pieces for the puzzle.
 */
CanvasState.prototype.createPieces = function() {
    this.piece_width = this.width / this.difficulty;
    this.piece_height = this.height / this.difficulty;
    var piece;
    var cx = 0;
    var cy = 0;

    for (var i = 0; i < this.difficulty * this.difficulty; i++) {
        piece = {};
        piece.ox = cx;
        piece.oy = cy;

        // Add next piece on the right side of the piece.
        cx += this.piece_width;
        // If we line is full go to next line.
        if (cx >= this.width) {
            cx = 0;
            cy += this.piece_height;
        }

        this.pieces.push(piece);
    }
};

/**
 * Sets the image to be used as puzzle.
 *
 * @param image
 */
CanvasState.prototype.setImage = function(image) {
    image = this.cropImage(image);
    this.image = image;

    var my_state = this;
    image.onload = function() {
        my_state.createPieces();
        my_state.shufflePieces();
        my_state.drawPieces();
    }
};

/**
 * Shuffles the pieces.
 */
CanvasState.prototype.shufflePieces = function() {
    this.pieces.sort(function() { return 0.5 - Math.random() });
    var x = 0;
    var y = 0;
    for (var i = 0; i < this.pieces.length; i++) {
        this.pieces[i].x = x;
        this.pieces[i].y = y;
        // Add next piece on the right side of the piece.
        x += this.piece_width;
        // If we line is full go to next line.
        if (x >= this.width) {
            x = 0;
            y += this.piece_height;
        }
    }
};

/**
 * Draws all the pieces.
 */
CanvasState.prototype.drawPieces = function() {
    var piece;
    var selected_piece = null;
    console.log('moi');
    this.context.clearRect(0, 0, 1140, 500);
    for (var i = 0; i < this.pieces.length; i++) {
        piece = this.pieces[i];
        if (!piece.selected) {
            this.drawPiece(piece);
        }
        else {
            selected_piece = piece;
        }
    }
    if (selected_piece && this.mouse) {
        this.context.drawImage(this.image, selected_piece.ox, selected_piece.oy, this.piece_width, this.piece_height, this.mouse.x, this.mouse.y, this.piece_width, this.piece_height);
    }

    this.context.save();
    this.context.globalAlpha = 0.2;
    this.context.drawImage(this.image, this.width + 134, 0, this.width, this.height);
    this.context.restore();
};

/**
 * Crops the main image to right size.
 *
 * @param image
 * @returns {Image}
 */
CanvasState.prototype.cropImage = function(image) {
    var canvas = document.createElement('canvas');
    canvas.height = this.height;
    canvas.width = this.width;
    var context = canvas.getContext('2d');

    var width = image.width;
    var height = image.height;

    var new_width = this.width;
    var new_height = this.height;

    var x = 0;
    var y = 0;

    if (width < height) {
        var ratio = width / height;
        new_height = ratio * this.height;
        y = - (new_height - this.height) / 2;
    }
    else {
        var ratio = width / height;
        new_width = ratio * this.width;
        x = - (new_width - this.width) / 2;
    }

    context.drawImage(image, x, y, new_width, new_height);

    var cropped_image = new Image();
    cropped_image.src = canvas.toDataURL();

    return cropped_image;
};

/**
 * Gets the position of mouse.
 *
 * @param event
 */
CanvasState.prototype.getMouse = function(event) {
    var rect = this.canvas.getBoundingClientRect();
    return {
        x: event.clientX - $(this.canvas).offset().left,
        y: event.clientY - $(this.canvas).offset().top,
    };
};

/**
 * Finds the pice under the mouse.
 *
 * @param position
 */
CanvasState.prototype.getPieceUnderMouse = function(position) {
    var piece;
    for (var i = 0; i < this.pieces.length; i++) {
        piece = this.pieces[i];
        if (this.isOverPiece(piece, position)) {
            return piece;
        }
    }

    return false;
};

/**
 * Tests if mouse is over on top of specific piece.
 *
 * @param piece
 * @param position
 * @returns {boolean}
 */
CanvasState.prototype.isOverPiece = function(piece, position) {
    if (position.x < piece.x || position.x > (piece.x + this.piece_width) || position.y <  piece.y || position.y > (piece.y + this.piece_height)) {
        // Not this one for sure.
    }
    else {
        return true;
    }
    return false;
};

CanvasState.prototype.isOnRightPlace = function(piece, position) {
    var offset = this.width + 134;
    if (position.x - offset < piece.x || position.x - offset > (piece.x + this.piece_width) || position.y <  piece.y || position.y > (piece.y + this.piece_height)) {
        // Not this one for sure.
    }
    else {
        return true;
    }
    return false;
};

