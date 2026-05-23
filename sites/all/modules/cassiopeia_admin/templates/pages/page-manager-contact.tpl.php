<?php
$contacts = array();
try{
    $query = db_select("tbl_contact","tbl_contact");
    $query->fields("tbl_contact");
    $query->orderBy("tbl_contact.contact_created","DESC");
    $contacts = $query->execute()->fetchAll();
    $limit = 6;
    $page = pager_default_initialize(count($contacts), $limit, 0);
    $offset = $limit * $page;
    if(!empty($contacts)){
        $contacts = array_slice($contacts, $offset, $limit);
    }else{
        $contacts=null;
    }
}catch (Exception $e){
    $contacts = array();
}
?>
<div class="page-manager-contact">
    <table class="table table-hovered table-stripped">
        <thead>
            <tr>
                <th>Ngày tạo</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Nội dung</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($contacts)): ?>
                <?php foreach($contacts as $contact): ?>
                    <tr>
                        <td><?php echo date("d/m/Y",$contact->contact_created); ?></td>
                        <td><?php echo $contact->contact_name; ?></td>
                        <td><?php echo $contact->contact_tel; ?></td>
                        <td><?php echo $contact->contact_mail; ?></td>
                        <td><?php echo $contact->contact_content; ?></td>
                        <td>
                            <a href="/admin/manager/contact/<?php echo $contact->contact_id; ?>/delete?destination=admin/manager/contact" class="btn btn-danger" title="Xóa"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <!-- paging-->
    <div class="page">
        <div class="cassiopeia-pagination">
            <div class="cassiopeia-pagination-container">
                <?php print (theme('pager',  array('tags' => array('«','‹','','›','»'))));?>
            </div>
        </div>
    </div>
    <!--e: paging-->
</div>
