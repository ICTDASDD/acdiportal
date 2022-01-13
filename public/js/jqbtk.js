// jQuery Bootstrap Touch Keyboard plugin
// By Matthew Dawkins
(function($) {
    $.fn.keyboard = function(options) {

        // Settings
        var settings = $.extend({
            keyboardLayout: [
                [
                    ['1', '1'],
                    ['2', '2'],
                    ['3', '3'],
                    ['4', '4'],
                    ['5', '5'],
                    ['6', '6'],
                    ['7', '7'],
                    ['8', '8'],
                    ['9', '9'],
                    ['0', '0'],
                    ['del', 'del']
                ],
                [
                    ['q', 'Q'],
                    ['w', 'W'],
                    ['e', 'E'],
                    ['r', 'R'],
                    ['t', 'T'],
                    ['y', 'Y'],
                    ['u', 'U'],
                    ['i', 'I'],
                    ['o', 'O'],
                    ['p', 'P'],
                    ['-', '='],
                    ['_', '+']
                ],
                [
                    ['a', 'A'],
                    ['s', 'S'],
                    ['d', 'D'],
                    ['f', 'F'],
                    ['g', 'G'],
                    ['h', 'H'],
                    ['j', 'J'],
                    ['k', 'K'],
                    ['l', 'L'],
                    ['\'', ':'],
                    ['@', ';'],
                    ['#', '~']
                ],
                [
                    ['z', 'Z'],
                    ['x', 'X'],
                    ['c', 'C'],
                    ['v', 'V'],
                    ['b', 'B'],
                    ['n', 'N'],
                    ['m', 'M'],
                    [',', ','],
                    ['.', '.'],
                    ['?', '!']
                ],
                [
                    ['shift', 'shift'],
                    ['space', 'space'],
                    ['shift', 'shift']
                ]
            ],
            numpadLayout: [
                [
                    ['7'],
                    ['8'],
                    ['9']
                ],
                [
                    ['4'],
                    ['5'],
                    ['6']
                ],
                [
                    ['1'],
                    ['2'],
                    ['3']
                ],
                [
                    //['del'],
                    ['0'],
                    //['.']
                ]
            ],
            telLayout: [
                [
                    ['1'],
                    ['2'],
                    ['3']
                ],
                [
                    ['4'],
                    ['5'],
                    ['6']
                ],
                [
                    ['7'],
                    ['8'],
                    ['9']
                ],
                [
                    ['del'],
                    ['0'],
                    ['.']
                ]
            ],
            layout: false,
            type: false,
            btnTpl: '<button type="button" tabindex="-1">',
            btnClasses: 'btn btn-default',
            btnActiveClasses: 'active btn-primary',
            initCaps: false,
            placement: 'bottom',
            container:'body',
            trigger: 'focus'
        }, options);
        if (!settings.layout) {
            if (($(this).attr('type') === 'tel' && $(this).hasClass('keyboard-numpad')) || settings.type === 'numpad') {
                settings.layout = settings.numpadLayout;
            } else if (($(this).attr('type') === 'tel') || settings.type === 'tel') {
                settings.layout = settings.telLayout;
            } else {
                settings.layout = settings.keyboardLayout;
            }
        }
        // Keep track of shift status
        var keyboardShift = false;
        var keyboardBloqMayus = false;
        
        function getKeyboardShift(){
            return keyboardShift || keyboardBloqMayus;
        }

        // Listen for keypresses
        var onKeypress = function(e) {
            $(this).addClass(settings.btnActiveClasses);
            var keyContent = $(this).attr('data-value' + (keyboardShift ? '-alt' : ''));
            var parent = $('[aria-describedby=' + $(this).closest('.popover').attr('id') + ']');
            var txt = parent.val();
            var selStart = parent[0].selectionStart;
            var selEnd = parent[0].selectionEnd;
            var currentContent = txt.slice(0, selStart);

            switch (keyContent) {
                case 'space':
                    currentContent += ' ';
                    selStart++;
                    break;
                case 'shift':
                    keyboardShift = !keyboardShift;
                    //keyboardShiftify();
                    break;
                case 'del':
                    selStart--;
                    currentContent = currentContent.substr(0, currentContent.length - 1);
                    break;
                case 'enter':
                    parent.closest('form').submit();
                    break;
                case 'close':
                    return true;
                default:
                    currentContent += keyContent;
                    selStart++;
                    keyboardShift = false;
            }
        
            /*
            parent.val(currentContent);
            keyboardShiftify();
            parent.focus();
            */
            parent.val(currentContent + txt.slice(selEnd, txt.length));
            keyboardShiftify();
            $(this).removeClass(settings.btnActiveClasses);
            parent.focus();
            parent[0].selectionStart = selStart;
            parent[0].selectionEnd = selStart;
        };

        $(document).off('touchstart', '.jqbtk-row .btn');
        $(document).on('touchstart', '.jqbtk-row .btn', onKeypress);

        $(document).off('mousedown', '.jqbtk-row .btn');
        $(document).on('mousedown', '.jqbtk-row .btn',function(e){
            var close = onKeypress.bind(this,e)();
            if (close === true) return;
            var parent = $('[aria-describedby=' + $(this).closest('.popover').attr('id') + ']');
            e.preventDefault();
        });
        
        // Update keys according to shift status
        var keyboardShiftify = function() {
            $('.jqbtk-container .btn').each(function() {
                switch ($(this).attr('data-value')) {
                    case 'shift':
                    case 'del':
                    case 'space':
                    case 'enter':
                    case 'close':
                        break;
                    default:
                        $(this).text($(this).attr('data-value' + (getKeyboardShift() ? '-alt' : '')));
                }
            });
        };
        
        var container = this.data('container');
        if(container!=undefined)
        {
            container = '#'+container;
            settings.container = container;
            settings.placement = 'in';
            settings.trigger = 'manual';
            $(container).addClass('keyboard-container');
        }
        // Set up a popover on each of the targeted elements
        return this.each(function() {
            $(this).popover({
                content: function() {
                    
                    // Optionally set initial caps
                    if (settings.initCaps && $(this).val().length === 0) {
                        keyboardShift = true;
                    }
                    keyboardBloqMayus = false;
                    // Set up container
                    var content = $('<div class="jqbtk-container" tabIndex="-1">');
                    $.each(settings.layout, function() {
                        var line = this;
                        var lineContent = $('<div class="jqbtk-row">');
                        $.each(line, function() {
                            var btn = $(settings.btnTpl).addClass(settings.btnClasses);
                            btn.attr('data-value', this[0]).attr('data-value-alt', this[1]);
                            switch (this[0]) {
                                case 'shift':
                                    btn.addClass('jqbtk-shift').html('<span class="material-icons">keyboard_arrow_up</span>');
                                    break;
                                case 'space':
                                    btn.addClass('jqbtk-space').html('<span class="material-icons">space_bar</span>');
                                    break;
                                case 'del':
                                    btn.addClass('jqbtk-del').html('<span class="material-icons">keyboard_backspace</span>');
                                    break;
                                case 'enter':
                                    btn.addClass('jqbtk-enter').html('<span class="material-icons">check</span>');
                                    break;
                                case 'close':
                                    //btn.addClass('jqbtk-close').html('<span class="material-icons">keyboard_hide</span>');
                                    btn.addClass('jqbtk-close btn-success').attr('data-value', 'close').attr('data-value-alt', 'close').html('<span class="material-icons">keyboard_hide</span>');
                                    break;
                                default:
                                    btn.text(btn.attr('data-value' + (keyboardShift ? '-alt' : '')));
                            }
                            lineContent.append(btn);
                        });
                        content.append(lineContent);
                    });
                    return content;
                },
                html: true,
                placement: settings.placement,
                trigger: settings.trigger,
                container:settings.container,
                viewport: settings.container
            });

            if(settings.trigger == 'manual')
            {
               $(this).popover('show');
            }
        });
    };
}(jQuery));
