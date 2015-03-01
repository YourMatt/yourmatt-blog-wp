var $ = jQuery;

$(document).ready (function () {

   yourMatt.setSearchFieldActions ();

});

var yourMatt = {

   searchText: "SEARCH",

   setSearchFieldActions: function () {

      var that = this;
      var initialValue = $("[name=search]").attr ("value"); // don't use val() because will return browser cached value

      // set the default value with the search title if no current value
      if (! initialValue) {
         $("[name=search]").val(this.searchText);
      }

      $("[name=search]").focus (function () {
         if ($(this).val () === that.searchText) $(this).val ("");
      });

      $("[name=search]").blur (function () {
         if ($(this).val () === "") $(this).val (that.searchText);
      });

      $("#search-form > a").click (function () {
         if ($("[name=search]").val () === that.searchText) return false;

         $("#search-form").submit ();
         return false;
      });

   }

};