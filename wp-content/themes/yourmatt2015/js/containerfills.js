
var containerFills = {

   setImageFills: function () {

      this.setRequiredProperties ();
      this.setFillScaled ();

   },

   setRequiredProperties: function () {

      $(".fill-scaled").css ({
         position: "relative",
         overflow: "hidden"
      });
      $(".fill-scaled > img").css ({
         position: "relative"
      });

   },

   setFillScaled: function () {
      var base = this;

      $(".fill-scaled > img").each (function () {

         // gather base attributes of the container and containing image
         var container = base.getObjectAttributes ($(this).parent ());
         var image = base.getObjectAttributes ($(this));
         if (! image.width) return;

         // set the position attributes
         var newPositions = {};
         if (container.aspectRatio < image.aspectRatio) {
            newPositions.width = container.height * image.aspectRatio;
            newPositions.height = container.height;
            newPositions.left =  - (newPositions.width - container.width) / 2;
            newPositions.top = 0;
         }
         else {
            newPositions.width = container.width;
            newPositions.height = container.width / image.aspectRatio;
            newPositions.left = 0;
            newPositions.top = - (newPositions.height - container.height) / 2;
         }

         $(this).css ({
            marginLeft: newPositions.left,
            marginTop: newPositions.top
         });
         $(this).width (newPositions.width);
         $(this).height (newPositions.height);

      });

   },

   // returns attributes necessary for calculating the position of the inner element
   getObjectAttributes: function (object) {
      return this.setAspectRatio ({
         width: object.width(),
         height: object.height()
      });
   },

   // calculates the aspect ratio of the area
   setAspectRatio: function (object) {
      if (object.width && object.height) {
         object.aspectRatio = object.width / object.height;
         object.isLandscape = object.width >= object.height;
      }
      return object;
   }

};
function containerFillsReset () {
   containerFills.setImageFills ();
}

$(document).ready (containerFillsReset);
$(window).resize (containerFillsReset);
