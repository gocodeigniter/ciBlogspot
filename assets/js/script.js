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

   // CKEDITOR
   CKEDITOR.replace( 'textarea' );

});