$(document).ready(function() {
  // Edit Comment Post
  $('.comment .comment-body .btn-edit').on('click', function() {

    // Declaration
    var routeEdit = $('meta[name="baseUrl"]').attr("content") + 'post/comment/' + $(this).attr('value') + '/edit';
    var index = $('.btn-edit').index( this );
    var valText = $('.btn-edit').eq( index )
                .parent()
                .parent()
                .find('.comment-subject')
                .html();
    var formEdit = '<form action="' + routeEdit + '" method="POST">' +
          '<div class="row">' +
             '<div class="col-11 textarea">' +
                '<textarea class="form-control" type="text" name="comment" placeholder="Tulis komentar disini.." rows="1">' + valText + '</textarea>' +
             '</div>' +
             '<div class="col-1 action text-right">' +
                '<button class="btn btn-primary btn-block" type="submit">Send</button>' +
             '</div>' +
          '</div>' +
       '</form>';

    // Remove Element Comment Subject
    $('.btn-edit')
       .eq( index )
       .parent()
       .parent()
       .find('.comment-subject').remove();

    // Append to Comment Body
    $('.btn-edit')
       .eq( index )
       .parent()
       .parent()
       .prepend( formEdit );

  });

   // Ajax Change Photo User
   $('.photo-profile').change(function() {

      // Declaration
      var file = $(this).prop('files')[0];
      var nameFile = file['name'];
      var formatFile = nameFile.substring(nameFile.lastIndexOf('.') + 1).toLowerCase();
      var reader = new FileReader();

      // Check Any File and Format File
      if( file && formatFile == 'jpg' || formatFile == 'jpeg' || formatFile == 'png' ) {

         // Change Image from Uploaded File Input
         reader.onload = function(e) {
            $('.image-photo-profile').attr('src', e.target.result);
         }
         reader.readAsDataURL(file);

         // Change Name Label Input File
         $('.photo-profile-label').html( nameFile );

      }

   });

  //iCheck for checkbox and radio inputs
  $('.mailbox-messages input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
  });

  //Enable check and uncheck all functionality
  $(".checkbox-toggle").click(function () {
    var clicks = $(this).data('clicks');
    if (clicks) {
      //Uncheck all checkboxes
      $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
      $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
    } else {
      //Check all checkboxes
      $(".mailbox-messages input[type='checkbox']").iCheck("check");
      $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
    }
    $(this).data("clicks", !clicks);
  });

  //Handle starring for glyphicon and font awesome
  $(".mailbox-star").click(function (e) {
    e.preventDefault();
    //detect type
    var $this = $(this).find("a > i");
    var glyph = $this.hasClass("glyphicon");
    var fa = $this.hasClass("fa");

    //Switch states
    if (glyph) {
      $this.toggleClass("glyphicon-star");
      $this.toggleClass("glyphicon-star-empty");
    }

    if (fa) {
      $this.toggleClass("fa-star");
      $this.toggleClass("fa-star-o");
    }
  });

  // CKEDITOR
  CKEDITOR.replace( 'textarea' );
});
