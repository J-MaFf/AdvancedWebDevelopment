<?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <?php echo $__env->make('includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Schedule of Classes</h1>
                <div class="dropdown">

                    <button class="btn btn-secondary dropdown-toggle" style="background-color: aliceblue; color: black" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo e($buttonText ?? 'Select a Subject'); ?>

                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a class="dropdown-item" href="<?php echo e(url('/schedule', ['subject' => $s->subject])); ?>"><?php echo e($s->subject . ': ' . $names[$index]->full_name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>


                </div>
                <h3>List of <?php echo e($subject); ?> Course Schedules</h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Course</th>
                            <th scope="col">Section</th>
                            <th scope="col">Time</th>
                            <th scope="col">Instructor</th>
                            <th scope="col">Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($c->subject); ?> <?php echo e($c->number); ?></td>
                            <td><?php echo e($c->section); ?></td>
                            <td><?php echo e($c->time); ?></td>
                            <td><?php echo e($c->instructor); ?></td>
                            <td><?php echo e($c->location); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</body><?php /**PATH C:\Users\7maff\Jetta\XAMPP\htdocs\AdvancedWebDevelopment\Assignment 3\uwwapp\resources\views/schedule.blade.php ENDPATH**/ ?>