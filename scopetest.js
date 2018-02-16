(function($) {
    $(function() {
        $.widget("custom.scopetest", {
            _create: function() {
            	console.log("foo");
                $(this.element).button();
            }
        });
    });
})(jQuery);
