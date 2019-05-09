
  <div class="col-md-9">
    <div class="box box-primary post-content">
      <div class="box-header with-border">
        <h3 class="box-title">Posts</h3>

        <div class="box-tools pull-right">
          <div class="has-feedback">
            <input type="text" class="form-control input-sm" placeholder="Search Posts">
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
          </div>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <div class="mailbox-controls">
          <!-- Check all button -->
          <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
          </button>
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
          </div>
          <!-- /.btn-group -->
          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
          <div class="pull-right">
            1-50/200
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
            </div>
            <!-- /.btn-group -->
          </div>
          <!-- /.pull-right -->
        </div>
        <div class="table-responsive mailbox-messages">
          <table class="table table-hover table-striped">
            <tbody>

            <?php foreach($posts as $row) : ?>
              <tr>
                <td><input type="checkbox"></td>
                <td class="mailbox-star">
                  <a href="#">
                    <i class="fa fa-star text-yellow"></i>
                  </a>
                </td>
                <td class="mailbox-name">
                  <a href="<?= base_url('dashboard') ?>">
                    <?= $row['name'] ?>
                  </a>
                </td>
                <td class="mailbox-subject">
                  <b><?= $row['title'] ?></b> -
                  <?= substr( strip_tags($row['subject']), 0, 25) . '...' ?>
                </td>
                <td class="mailbox-attachment"></td>
                <td class="mailbox-date">
                  <?= date_diff(
                        date_create( date('Y-m-d H:i:s', strtotime( $row['datetime']) ) ),
                        date_create( date('Y-m-d H:i:s') )
                      )->format('%d Day %h Hours')
                    ?>
                </td>
              </tr>
            <?php endforeach; ?>

            </tbody>
          </table>
          <!-- /.table -->
        </div>
        <!-- /.mail-box-messages -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer no-padding">
        <div class="mailbox-controls">
          <!-- Check all button -->
          <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
          </button>
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
          </div>
          <!-- /.btn-group -->
          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
          <div class="pull-right">
            1-50/200
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
            </div>
            <!-- /.btn-group -->
          </div>
          <!-- /.pull-right -->
        </div>
      </div>
    </div>
    <!-- /. box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
