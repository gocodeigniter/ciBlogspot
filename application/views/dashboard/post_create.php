<form action="" method="POST">
  <div class="col-md-9">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Create New Post</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <input name="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
          <input name="username" class="form-control" placeholder="Username User">
        </div>
        <div class="form-group">
          <textarea name="subject" id="compose-textarea" class="form-control" style="height: 300px" placeholder="Type what you mind..."></textarea>
        </div>
        <div class="form-group">
          <div class="btn btn-default btn-file">
            <i class="fa fa-paperclip"></i> Attachment
            <input type="file" name="attachment">
          </div>
          <p class="help-block">Max. 32MB</p>
        </div>
      </div>
      <div class="box-footer">
        <div class="pull-right">
          <button name="drafts" type="submit" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
          <button name="publish" type="submit" class="btn btn-success"><i class="fa fa-globe"></i> Publish</button>
        </div>
        <button type="reset" class="btn btn-default" onclick="return confirm('Are You Sure to Discard This Post?')">
          <i class="fa fa-times"></i>
          Discard
        </button>
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /. box -->
  </div>
</form>
