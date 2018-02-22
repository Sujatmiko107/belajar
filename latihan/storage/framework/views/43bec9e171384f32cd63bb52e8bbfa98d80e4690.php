
<?php $__env->startSection('content'); ?>
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Data karyawan
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-4 pull-right">

                      <form class="" action="<?php echo e(url('karyawan/search')); ?>" method="get">
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
                    <a href="<?php echo e(url('karyawan/add')); ?>"><button type="button" class="btn btn-primary">Tambah</button></a>
                      <table class="table table-striped table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Jabatan</th>
                                  <th>No HP</th>
                                  <th>Alamat</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(count($karyawan)): ?>
                              <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                  <td><?php echo e($data->no); ?></td>
                                  <td><?php echo e($data->nama); ?></td>
                                  <td><?php echo e($data->jenis_kelamin); ?></td>
                                  <td><?php echo e($data->jabatan); ?></td>
                                  <td><?php echo e($data->no_hp); ?></td>
                                  <td><?php echo e($data->alamat); ?></td>
                                  <td>
                                    <a href="<?php echo e(url('karyawan/edit/'. $data->no)); ?>"><button type="button" class="btn btn-info">Ubah</button></a>
                                    <a href="<?php echo e(url('karyawan/delete/'. $data->no)); ?>" onclick="return confirm('Apakah anda ingin membatalkan Permohonan ?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                                  </td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </tbody>
                      </table>
                      <?php echo $karyawan->links(); ?>

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