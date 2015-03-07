
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
         base.fillImageScaled ($(this));
      });

   },

   fillImageScaled: function (imageTag) {

      // gather base attributes of the container and containing image
      var container = this.getObjectAttributes (imageTag.parent ());
      var image = this.getObjectAttributes (imageTag);
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

      imageTag.css ({
         marginLeft: newPositions.left,
         marginTop: newPositions.top
      });
      imageTag.width (newPositions.width);
      imageTag.height (newPositions.height);

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

   // set the individual image area to be centered after loading
   $(".fill-scaled > img").load (function () {
      console.log ($(this).width() + " x " + $(this).height() + " - " + $(this).attr("src"));
      containerFills.fillImageScaled ($(this));
   });
}

$(document).ready (containerFillsReset);
$(window).resize (containerFillsReset);

