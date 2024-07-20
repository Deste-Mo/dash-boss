<div class="container-fluid">
    <!--======================================================  Content  ====================================================-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Listes des commentaires</a>
        </li>
    </ol>
    <div class="table-responsive">
        <table class="table table-hover ">
            <thead>
                <tr class="table-primary">
                    <th>Nom de </th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $comment = getComment($conn);
                    foreach ($comment as $c):
                ?>
                <tr>
                    <td ><?= $c['comment_name']; ?></td>
                    <td ><?= $c['comment_mail']; ?></td>
                    <td class="text-right">
                        <a href="#" data-toggle="modal" data-target="#myModal<?= $c['comment_id']; ?>" onclick="seeMessage(this, '<?= $c['comment_id'] ?>', '<?= $c['status'] ?>')">
                            Voir le commentaire
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php foreach ($comment as $c): ?>
            <div class="modal" id="myModal<?= $c['comment_id']; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Notification</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <span>
                                <?= $c['comment_message']; ?>
                            </span>
                        </div>

                        <div class="modal-footer">
                            <label for="Date"><?= $c['comment_date']; ?></label>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <div id="allMessage" class="container-fluid d-flex flex-column justify-content-between">
        <!-- <div class="bg-dark d-flex justify-content-between p-3">
            <label for="nom" style="font-weight: 400;color:white; text-align:center;">Nom</label>
            <label for="nom" style="font-weight: 400;color:white; text-align:center;">email</label>
            <label for="action" style="font-weight: 400;color:white; text-align:center;">Message</label>
        </div> -->
        <div style="max-height: 400px; overflow:auto;">
            <?php
            $comment = getComment($conn);
            foreach ($comment as $c):
                ?>
                <!-- <div class="m-2" id="<?= $c['comment_id'] ?>">
                    <div class="d-flex justify-content-between p-2 "
                        style="background-color:<?= $c['status'] == 'N' ? 'lightBlue' : 'white' ?>;color:white;">
                        <label for="nom"
                            style="font-weight: 400;color:black; text-align:center;"><?= $c['comment_name'] ?></label>
                        <label for="nom"
                            style="font-weight: 400;color:black; text-align:center;"><?= $c['comment_mail'] ?></label>
                        <button class="btn btn-primary"
                            onclick="seeMessage(this, '<?= $c['comment_id'] ?>', '<?= $c['status'] ?>')" style="background-color:white; color:black;border:none;"><i class="fa fa-chevron-down"></i></button>
                    </div>
                    <div class="messageContainer my-1 d-flex justify-content-between" style="background-color: #0895ae8d;">
                        <span class="m-2" id="messageContent" style="font-weight: 200;color:white"><span style="font-weight:800;color:white;">Message:</span>
                            <?= $c['comment_message'] ?></span>
                        <a class="m-2" href="mailto:<?= $c['comment_mail'] ?>"><button class="btn text-white"
                                id="respond"><i class="fa fa-reply"></i></button></a>
                    </div>
                </div> -->
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    function seeMessage(button, id, status) {
        var container = $(button).closest('div').next('.messageContainer');
        container.slideToggle().toggleClass('d-none');

        if (status == 'N') {
            $.ajax({
                type: "POST",
                url: "api/update/setNotifVue.php",
                data: {
                    idTo: id
                },
                dataType: "JSON",
                success: function (response) {
                    if (response.success) {
                        $('#' + id).load(location.href + ' #' + id);
                        $('#headerDiv').load(location.href + ' #headerDiv');
                    }
                    if (response.error) {
                        alert(responses.uploadsErr);
                        $('#' + id).load(location.href + ' #' + id);
                        $('#headerDiv').load(location.href + ' #headerDiv');
                    }
                }
            })
        }
    }
</script>