define(['uiComponent'], function(Component) {
    return Component.extend({
        initialize: function () {
            this._super();
            this.frontData = "Hello this is content populated with KO!";
        }
    });
});