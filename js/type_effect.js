! function($) {
    "use strict";

    class Typed {
        constructor(el, options) {
            this.el = $(el);
            this.options = $.extend({}, $.fn.typed.defaults, options);
            this.init();
        }

        init() {
            this.arrayPos = 0;
            this.typeNextString();
        }

        typeNextString() {
            if (this.arrayPos < this.options.strings.length) {
                this.typeString(this.options.strings[this.arrayPos], 0, () => {
                    setTimeout(() => {
                        this.arrayPos++;
                        this.typeNextString();
                    }, this.options.backDelay);
                });
            } else if (this.options.loop) {
                this.arrayPos = 0;
                this.typeNextString();
            }
        }

        typeString(str, pos, done) {
            if (pos < str.length) {
                this.el.attr("placeholder", str.substr(0, pos + 1));
                setTimeout(() => this.typeString(str, pos + 1, done), this.options.typeSpeed);
            } else {
                done();
            }
        }
    }

    $.fn.typed = function(option) {
        return this.each(function() {
            let $this = $(this),
                data = $this.data('typed'),
                options = typeof option == 'object' && option;

            if (!data) $this.data('typed', (data = new Typed(this, options)));
            if (typeof option == 'string') data[option]();
        });
    }

    $.fn.typed.defaults = {
        strings: ["These are the default values...", "You know what you should do?", "Use your own!", "Have a great day!"],
        typeSpeed: 0,
        backDelay: 500,
        loop: false
    }
}(window.jQuery);
