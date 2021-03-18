<!DOCTYPE HTML>
<html>

<head>
    <title>data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


</head>

<body>

    <div class="container">

        <div class="page-header">
            <h1> all users</h1>

        </div>







        <table class='table table-hover table-bordered table-dark'>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>phone</th>
                <th>email</th>
                <th>created_at</th>
                <th>Action</th>

            </tr>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<tr>


                <td><?php echo e($row->id); ?></td>
                <td><?php echo e($row->name); ?></th>
                <td><?php echo e($row->phone); ?></th>
                <td><?php echo e($row->email); ?></td>

                <td><?php echo e($row->created_at); ?></td>

                <td>
                <a    href="<?php echo e(url('/delete/'.$row['id'])); ?>"class='btn btn-danger m-r-1em'>Delete</a> 
                <a  href="<?php echo e(url('/showuser/'.$row['id'])); ?>" class='btn btn-primary m-r-1em'>show</a> 
                </td>

</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





        </table>
        <?php echo e($data->links()); ?>


        

    </div>

<br>
<br>
    <div class="container">


 <form action="<?php echo e(url('/logout')); ?>" method="post" >

 <input   type='hidden'  name='_token' value='<?php echo e(csrf_token()); ?>'>

 <button type="submit"  name= "Submit1" class="btn btn-danger"  >Log out</button>

 </form>
</div>



</body>

</html>
<?php /**PATH C:\xampp\htdocs\firstproject\resources\views/display.blade.php ENDPATH**/ ?>