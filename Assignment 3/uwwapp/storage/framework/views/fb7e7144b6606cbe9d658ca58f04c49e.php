<?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <?php echo $__env->make('includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3>Course Catalog</h3>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Select Subject
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a class="dropdown-item" href="<?php echo e(url('/coursesbysubject', [$s->subject])); ?>"><?php echo e($s->full_name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </ul>
                </div>
                <h2>List of <?php echo e($subject); ?> Courses</h2>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Title</th>
                            <th>Credits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($c->subject); ?> <?php echo e($c->number); ?></td>
                            <td><?php echo e($c->title); ?></td>
                            <td><?php echo e($c->credits); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</body><?php /**PATH C:\Users\7maff\Jetta\XAMPP\htdocs\AdvancedWebDevelopment\Assignment 3\uwwapp\resources\views/courses.blade.php ENDPATH**/ ?>