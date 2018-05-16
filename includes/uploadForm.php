<div class="comment">
    <div class="wrapper-nested-comment">
        <form id="uploadForm" action="updateVerUpload.php" method="post" enctype="multipart/form-data">
            <div class="input-comment-head-nested"><h1>Comments</h1></div>
            <div class="input-comment-name-nested">

                <label for="name">Name</label>
                <input id="name" type="text" name="name">
            </div>
            <div class="input-comment-review-nested">
                <label for="comment">Review</label>
                <input id="comment" type="text" name="comment">
            </div>
            <div class="buttons-comment-nested">
                <label for="upload">Drop or select an image:</label>

                <div id="dropContainer" class="upload-area"><input type="file" id="file" name="image"/><h6>Empty Space</h6></div>
                <br>
                <!---<input type="file" id="image" name="image" value="UPLOAD" /><br>-->
                <input type="submit" id="submit" value="Upload" name="submit"/>
            </div>

            <div id="error"></div>
        </form>
    </div> <!-- close nested comment grid -->
</div><!-- close comment grid -->
