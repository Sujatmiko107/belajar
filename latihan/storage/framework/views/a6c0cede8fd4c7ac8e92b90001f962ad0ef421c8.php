
<?php $__env->startSection('content'); ?>
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Data Kehadiran
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-4 pull-right">

                      <form class="" action="<?php echo e(url('kehadiran/search')); ?>" method="get">
                        <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        </span>
                        </div>
                      </form>


                  </div>
                </div>


                  <div class="table-responsive">
                    <a href="<?php echo e(url('kehadiran/add')); ?>"><button type="button" class="btn btn-primary">Tambah</button></a>
                      <table class="table table-striped table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Hari,Tanggal</th>
                                  <th>Jam Datang</th>
                                  <th>Jam Pulang</th>
                                  <th>Jam Kerja</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(count($kehadiran)): ?>
                              <?php $__currentLoopData = $kehadiran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                  <td><?php echo e($data->no); ?></td>
                                  <td><?php echo e($data->nama); ?></td>
                                  <td><?php echo e($data->hari_tanggal); ?></td>
                                  <td><?php echo e($data->jam_datang); ?></td>
                                  <td><?php echo e($data->jam_pulang); ?></td>
                                  <td><?php echo e($data->jam_kerja); ?></td>
                                  <td>
                                    <a href="<?php echo e(url('kehadiran/edit/'. $data->no)); ?>"><button type="button" class="btn btn-info">Ubah</button></a>
                                    <a href="<?php echo e(url('kehadiran/delete/'. $data->no)); ?>" onclick="return confirm('Apakah anda ingin membatalkan Permohonan ?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                                  </td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </tbody>
                      </table>
                      <?php echo $kehadiran->links(); ?>

                    <?php endif; ?>
                  </div>
                  <!-- /.table-responsive -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-6 -->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>