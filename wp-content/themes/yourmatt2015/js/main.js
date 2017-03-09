var $ = jQuery;

$(document).ready (function () {

   yourMatt.setSearchFieldActions ();
   yourMatt.setPanoramicFormatting ();

   $(window).resize(yourMatt.setPanoramicFormatting);

});

var yourMatt = {

   searchText: "SEARCH",

   setSearchFieldActions: function () {

      var that = this;
      var initialValue = $("[name=s]").attr ("value"); // don't use val() because will return browser cached value

      // set the default value with the search title if no current value
      if (! initialValue) {
         $("[name=s]").val (this.searchText);
      }

      $("[name=s]").focus (function () {
         if ($(this).val () === that.searchText) $(this).val ("");
      });

      $("[name=s]").blur (function () {
         if ($(this).val () === "") $(this).val (that.searchText);
      });

      $("#search-form > a").click (function () {
         if ($("[name=s]").val () === that.searchText) return false;

         $("#search-form").submit ();
         return false;
      });

   },

   setPanoramicFormatting: function () {

      var margin = 0 - ($("#primary").width() - $("#main").width()) / 2;
      $("dl").has("img[alt=pano]").css({
         "margin-left": margin,
         "margin-right": margin
      });

   }

};