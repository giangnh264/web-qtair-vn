<?php
$_adt = $variables['adt'];
$_chd = $variables['chd'];
$_inf = $variables['inf'];
$total = $_adt + $_chd + $_inf;
?>
<?php $index=1; ?>
<?php for($i=$index;$i<=$_adt;$i++): ?>
    <div class="customer customer-adt">
        <div class="block-title">
            <?php print($index); ?>. Người lớn
        </div>
        <div class="block-content">
            <div class="info row">
                <div class="info-gender col-md-2">
                    <select class="form-control" name="" id="">
                        <option value="0">Mr</option>
                        <option value="1">Mrs</option>
                    </select>
                </div>
                <div class="info-first-name col-md-5">
                    <input type="text" class="form-control" placeholder="Họ">
                </div>
                <div class="info-last-name col-md-5">
                    <input type="text" class="form-control" placeholder="Tên">
                </div>
            </div>
        </div>
    </div>
    <?php $index++; ?>
<?php endfor; ?>

<?php for($i=1;$i<=$_chd;$i++): ?>
    <div class="customer customer-chd">
        <div class="block-title">
            <?php print($index); ?>. Trẻ em
        </div>
        <div class="block-content">
            <div class="info row">
                <div class="info-gender col-md-2">
                    <select class="form-control" name="" id="">
                        <option value="0">Mr</option>
                        <option value="1">Mrs</option>
                    </select>
                </div>
                <div class="info-first-name col-md-5">
                    <input type="text" class="form-control" placeholder="Họ">
                </div>
                <div class="info-last-name col-md-5">
                    <input type="text" class="form-control" placeholder="Tên">
                </div>
            </div>
        </div>
    </div>
    <?php $index++; ?>
<?php endfor; ?>

<?php for($i=1;$i<=$_inf;$i++): ?>
    <div class="customer customer-inf">
        <div class="block-title">
            <?php print($index); ?>. Em bé
        </div>
        <div class="block-content">
            <div class="info row">
                <div class="info-gender col-md-2">
                    <select class="form-control" name="" id="">
                        <option value="0">Mr</option>
                        <option value="1">Mrs</option>
                    </select>
                </div>
                <div class="info-first-name col-md-5">
                    <input type="text" class="form-control" placeholder="Họ">
                </div>
                <div class="info-last-name col-md-5">
                    <input type="text" class="form-control" placeholder="Tên">
                </div>
            </div>
        </div>
    </div>
    <?php $index++; ?>
<?php endfor; ?>
