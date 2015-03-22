<div class="col-xs-6 col-md-3">
    <a href="#" class="thumbnail">
        <img src="../uploads/images/late.jpg" alt="...">
    </a>
    <div class="center-block">
    <h4><?php echo $model->name.'<br>'; ?> </h4>
    <?php echo $model->detail; ?>
    <button type="button" class="btn btn-info"><?php echo 'ราคา '.$model->price.' บาท';?></button>
    </div>
</div>
