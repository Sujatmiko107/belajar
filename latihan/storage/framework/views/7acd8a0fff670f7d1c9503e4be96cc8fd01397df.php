<?php $__env->startSection('content'); ?>
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Tambah karyawan
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="col-lg-6">
                    <form role="form" action="<?php echo e(url('karyawan/create')); ?>" method="POST">
                      <?php echo e(csrf_field()); ?>

                        <div class="form-group" <?php echo e($errors->has('nama') ? ' has-error' : ''); ?>>
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama">

                            <?php if($errors->has('nama')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('nama')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group" <?php echo e($errors->has('jenis_kelamin') ? ' has-error' : ''); ?>>
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin">
                                  <option value="">-------</option>
                                  <option value="Pria">Pria</option>
                                  <option value="Wanita">Wanita</option>
                            </select>

                            <?php if($errors->has('jenis_kelamin')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('jenis_kelamin')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group" <?php echo e($errors->has('jabatan') ? ' has-error' : ''); ?>>
                            <label>Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" placeholder="Jabatan">

                            <?php if($errors->has('jabatan')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('jabatan')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group" <?php echo e($errors->has('no_hp') ? ' has-error' : ''); ?>>
                            <label>No HP</label>
                            <input type="text" class="form-control" name="no_hp" placeholder="No HP">

                            <?php if($errors->has('no_hp')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('no_hp')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group" <?php echo e($errors->has('alamat') ? ' has-error' : ''); ?>>
                            <label>Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control"></textarea>
                            <?php if($errors->has('alamat')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('alamat')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-6 -->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>