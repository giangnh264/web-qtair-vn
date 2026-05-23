<?php
try{
    $query = db_select("tbl_module","tbl_module");
    $query->fields("tbl_module");
    $result = (array)$query->execute()->fetchAll();
    
}catch (Exception $e){
    _print_r($e);
}
?>
<div class="s-block">
    <div class="add-block">
        <a href="/admin/manager/modules/add?destination=admin/manager/modules" class="btn btn-primary">Thêm mới</a>
    </div>
</div>
<div class="s-block">
    <table class="table table-hover table-stripped">
        <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Module</th>
            <th>Function</th>
            <th>Sửa</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt=1; foreach($result as $value): ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $value->id; ?></td>
                <td><?php echo $value->title; ?></td>
                <td><?php echo $value->p_name; ?></td>
                <td><a href="/admin/manager/modules/<?php echo $value->id; ?>/edit?destination=admin/manager/modules"><i class="fa fa-edit"></i></a></td>
            </tr>
            <?php $stt++; endforeach; ?>
        </tbody>
    </table>
</div>