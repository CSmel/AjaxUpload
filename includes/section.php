<script>
    $(document).ready(function () {

        $('.section-container').animate({
            scrollTop: $('.section-container')[0].scrollHeight
        }, 2000, function () {
            $('#open-dialog').css("visibility", " visible");
            $('#dialog').css("visibility", " visible");

        });
        $(function () {
            $("#dialog").dialog({
                dialogClass: "no-close",
                autoOpen: false,
                modal: true,
                show: {
                    effect: "drop",
                    duration: 1000
                },
                hide: {
                    effect: "drop",
                    duration: 1000
                }
            });
            $("#dialog-end").dialog({
                dialogClass: "no-close",
                autoOpen: false,
                modal: true,
                show: {
                    effect: "drop",
                    duration: 1000
                },
                hide: {
                    effect: "drop",
                    duration: 1000
                }
            });
        });

        $('#open-dialog').on("click", function () {
            $("#dialog").dialog("open");
            $("#yay").on("click", function () {
                $("#dialog").dialog("close");
                $('#uploadForm').show();
                $('.section').hide();
                $('#open-dialog').css("visibility", "hidden");

                $('.comment').css("display", "grid");
                $('#wrapper').addClass('wrapperComment').removeClass('wrapperSection');

            });
            $("#nay").on("click", function () {
                $("#dialog").dialog("close");
                $("#dialog-end").css("visibility", "visible");
                setTimeout("$('#dialog-end').dialog('open')", 1000);
                setTimeout("window.location.href='index.php';", 4000);

            });

        });
    });


</script>
<div id="dialog-end">
    <h2>Well, see ya!</h2>
</div>
<div id="dialog" title="Upload again?">
    <button id="yay">Yay</button>
    or
    <button id="nay">Nay</button>
</div>
<button id="open-dialog">Again?</button>
<div class="section-container">

    <?php
    //DB details
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'creativedb';
    try {
        $connection = new PDO('mysql:host=localhost;dbname=creativedb', $dbUsername, $dbPassword);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $connection->prepare("SELECT  image, name, comment, dateVal, timeVal FROM commenter");
        $sql->execute();
        header('Content-type: image');
        $result = $sql->fetchAll();
        if ($result > 0) {
            // output data of each row
            foreach ($result as $row) {
                echo "<div id='containerScroll'>";
                echo '<img class="small" src="data:image/png;base64,' . base64_encode($row["image"]) . '" /><br>';
                echo '<b>' . $row["name"] . "@</b>" . $row["dateVal"] . "//" . date('h:i A', strtotime($row["timeVal"])) . "<br>";
                echo "<div class='commentOutput'>" . $row["comment"] . "</div><br>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $connection = null;
    ?>
</div> <!-- close section container -->

