define([
   'ko',
   'uiComponent',
   'mage/url',
   'mage/storage',
], function (ko, Component, urlBuilder,storage) {
   'use strict';
   var id=1;

   return Component.extend({

       defaults: {
           template: 'Baju_FrontController/frontcontroller_index_index.phtml',
       },

       frontList: ko.observableArray([]),

       getFrontData: function () {
           var self = this;
           var serviceUrl = urlBuilder.build('frontcontroller/index/index?front_id='+id);
           id ++;
           return storage.post(
               serviceUrl,
               ''
           ).done(
               function (response) {
                   self.productList.push(JSON.parse(response));
               }
           ).fail(
               function (response) {
                   alert(response);
               }
           );
       },

   });
});