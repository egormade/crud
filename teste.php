<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script> 
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>

        <script>
            $(document).ready(function () {

                // Delete 
                $('.delete').click(function () {
                    var el = this;

                    // Delete id
                    var deleteid = $(this).data('id');

                    // Confirm box
                    bootbox.confirm("Do you really want to delete record?", function (result) {

                        if (result) {
                            // AJAX Request
                            $.ajax({
                                url: 'ajaxfile.php',
                                type: 'POST',
                                data: {id: deleteid},
                                success: function (response) {

                                    // Removing row from HTML Table
                                    if (response == 1) {
                                        $(el).closest('tr').css('background', 'tomato');
                                        $(el).closest('tr').fadeOut(800, function () {
                                            $(this).remove();
                                        });
                                    } else {
                                        bootbox.alert('Record not deleted.');
                                    }

                                }
                            });
                        }

                    });

                });
            });
        </script>

    </head>
    <style type="text/css">
        .main-section{
            margin-top:150px;
        }
    </style>
    <body>

        <?php
        include "conn/conn.php";
        ?>
        <div class='container'>
            <table>
                <tr style='background: whitesmoke;'>
                    <th>S.no</th>
                    <th>Title</th>
                    <th>Operation</th>
                </tr>

                <?php
                $query = "SELECT * FROM usuario ORDER BY data_cadastro DESC";
                $result = mysqli_query($conn, $query);

                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_usuario'];
                    $title = $row['nom_usuario'];
                    $link = $row['email_usuario'];
                    ?>
                    <tr>
                        <td align='center'><?= $count ?></td>
                        <td><a href='<?= $link ?>' target='_blank'><?= $title ?></a></td>
                        <td align='center'>
                            <button class='delete btn btn-danger' id='del_<?= $id ?>' data-id='<?= $id ?>' >Delete</button>
                        </td>
                    </tr>
                    <?php
                    $count++;
                }
                ?>
            </table>
        </div>
    </body>
</html>