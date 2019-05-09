<div class="row">
  <div class="col-md-3">

    <?php if( current_url() == base_url('dashboard/post/create') ) : ?>
      <a href="<?= base_url('dashboard/post/all') ?>" class="btn btn-primary btn-block margin-bottom">Back to Post</a>
    <?php else : ?>
      <a href="<?= base_url('dashboard/post/create') ?>" class="btn btn-primary btn-block margin-bottom">Create New Post</a>
    <?php endif; ?>

    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Folders</h3>

        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <button type="button" class="btn btn-default ajax ajax-publish">Ajax Test</button>
          <li class="<?= current_url() == base_url('dashboard/post') ? 'active' : '' ?>">
            <a href="<?= base_url('dashboard/post') ?>">
              <i class="fa fa-inbox"></i>
              All
            </a>
          </li>
          <li class="<?= current_url() == base_url('dashboard/post/publish') ? 'active' : '' ?>">
            <a class="ajax post-publish" href="javascript:;">
              <i class="fa fa-file-text-o"></i>
              Publish
              <span class="label label-primary pull-right">0</span>
            </a>
          </li>
          <li class="<?= current_url() == base_url('dashboard/post/drafts') ? 'active' : '' ?>">
            <a class="ajax post-drafts" href="javascript:;">
              <i class="fa fa-file-text-o"></i>
              Drafts
              <span class="label label-primary pull-right">0</span>
            </a>
          </li>
          <li class="<?= current_url() == base_url('dashboard/post/favorites') ? 'active' : '' ?>">
            <a class="ajax post-favorites" href="javascript:;">
              <i class="fa fa-file-text-o"></i>
              Favorites
              <span class="label label-primary pull-right">0</span>
            </a>
          </li>
          <li class="<?= current_url() == base_url('dashboard/post/trash') ? 'active' : '' ?>">
            <a class="ajax post-trash" href="javascript:;">
              <i class="fa fa-trash-o"></i>
              Trash
              <span class="label label-warning pull-right">65</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /. box -->
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Labels</h3>

        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
          <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
          <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
