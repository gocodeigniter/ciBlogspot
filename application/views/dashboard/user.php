<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Responsive Hover Table</h3>

        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-striped table-bordered">

          <col width="5%">
          <col width="35%">
          <col width="20%">
          <col width="15%">
          <col width="10%">
          <col width="10%">

          <thead>
            <th class="text-center">#</th>
            <th>Name</th>
            <th>Username</th>
            <th class="text-center">Role</th>
            <th class="text-center">Status</th>
            <th></th>
          </thead>
          <tr>
            <td class="text-center">183</td>
            <td>
              <a href="<?= base_url('dashboard/user/detail') ?>">John Doe</a>
            </td>
            <td>Username1</td>
            <td class="text-center">Admin</td>
            <td class="text-center">
              <span class="label label-success">Online</span>
            </td>
            <td class="text-center">
              <form action="" method="POST">
                <a class="btn btn-success btn-xs" href="#">Edit</a>
                <button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure to delete this data?')">Delete</button>
              </form>
            </td>
          </tr>
          <tr>
            <td class="text-center">219</td>
            <td>Alexander Pierce</td>
            <td>Username2</td>
            <td class="text-center">Writer</td>
            <td class="text-center"><span class="label label-warning">Banned</span></td>
            <td class="text-center">
              <form action="" method="POST">
                <a class="btn btn-success btn-xs" href="#">Edit</a>
                <button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure to delete this data?')">Delete</button>
              </form>
            </td>
          </tr>
          <tr>
            <td class="text-center">175</td>
            <td>Mike Doe</td>
            <td>Username3</td>
            <td class="text-center">Commenter</td>
            <td class="text-center"><span class="label label-danger">Offline</span></td>
            <td class="text-center">
              <form action="" method="POST">
                <a class="btn btn-success btn-xs" href="#">Edit</a>
                <button class="btn btn-danger btn-xs" type="submit" onclick="return confirm('Are you sure to delete this data?')">Delete</button>
              </form>
            </td>
          </tr>
        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>
