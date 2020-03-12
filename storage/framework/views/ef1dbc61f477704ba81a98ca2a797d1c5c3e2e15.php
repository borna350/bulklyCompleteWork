<?php $__env->startSection('content'); ?>
<div class="container-fluid app-body app-home">
    <div class="row home-block">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Recent Post Sent To Buffer</h3>
                    <div class="activities">
                      <div class="col-md-6">
                        <form class="form-inline" action="" method="get">
                          <div class="form-group">
                            <input type="search" class="form-control" name="search" placeholder="Search" value="<?php echo e($search_key?$search_key:null); ?>">

                          </div>
                          <div class="form-group"> 
                               
                                <input type="text"  name="date"  placeholder="Select Date" class="form-control float-right" id="datepicker" value="<?php echo e($date_key?$date_key:null); ?>">
                             
                                
                        </div>
                          <div class="form-group">
                            
                            <select class="form-control custom-select" name="group_type">
                              <option selected disabled>All CAtegory</option>
                                  <?php $__currentLoopData = $group_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($data['type'] == 'upload'): ?>
                                    <option <?php if($type_key == $data['type']): ?> selected <?php endif; ?> value="<?php echo e($data['type']); ?>">Content Upload</option>
                                    <?php elseif($data['type'] == 'curation'): ?>
                                     <option <?php if($type_key == $data['type']): ?> selected <?php endif; ?> value="<?php echo e($data['type']); ?>">Content Curation</option>
                                    <?php elseif($data['type'] == 'rss-automation'): ?>
                                     <option <?php if($type_key == $data['type']): ?> selected <?php endif; ?> value="<?php echo e($data['type']); ?>"> RSS Automation</option>
                                     <?php endif; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                          </button>
                         
                        </form>
                      </div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Group Name</th> <th>Group Type</th> <th>Account Name</th> <th>Post Text</th> <th>Time</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                    <td><?php echo e($data->groupInfo->name); ?></td>
                                    <td>
                                      <?php if($data->groupInfo['type'] == 'upload'): ?>
                                      Content Upload
                                      <?php elseif($data->groupInfo['type'] == 'curation'): ?>
                                      Content Curation
                                      <?php elseif($data->groupInfo['type'] == 'rss-automation'): ?>
                                      RSS Automation
                                      <?php else: ?>
                                      <td></td>
                                      <?php endif; ?>
                                    </td>
                                    <?php if($data->accountInfo['type'] != 'google'): ?>
                                    <td width="350">
                                      <div class="media">
                                          <div class="media-left">
                                          <span class="fa fa-<?php echo e($data->accountInfo['type']); ?>"></span>
                                          <img width="50" class="media-object img-circle" src="<?php echo e($data->accountInfo['avatar']); ?>" alt="">
                                          </div>
                                      </div>
                                    </td>
                                      <?php else: ?>
                                      <td></td>
                                      <?php endif; ?>
                                   
                                    <td><?php echo e($data->post_text); ?></td>
                                    <td> <?php echo e(date("j F, Y h:i a", strtotime($data->sent_at))); ?></td>
                                  </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                              </table>
                              <?php echo e($groups->appends($_GET)->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>