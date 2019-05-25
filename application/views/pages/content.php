
    <div class="container" style="margin:7% auto;">
    	<h4>Latest Discussion</h4>
    	<hr>
         <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Programming</h3>
                </div> 
                 <div class="panel-body">
         
              
                
                            <?php
                             echo "<label>Topic Title: </label> ".$post->title."<br>";
                             echo "<label>Topic Category: </label> ".$post->category."<br>";
                             echo "<label>Date time posted: </label> ".$post->datetime;
                             echo "<p class='well'>".$post->content."</p>";
                             echo '<label>Posted By: </label>'.$post->fname.' '.$post->lname;
              ?>

              <br><label>Comments</label><br>
              <div id="comments">
              <?php 
              foreach ($comments as $c ) {
                echo "<label>Comment by: </label> ".$c['fname']." ".$c['lname']."<br>";
                echo '<label class="pull-right">'.$c['datetime'].'</label>';
                echo "<p class='well'>".$c['comment']."</p>";
              }

              ?>
            </div>
              </div>
          </div>
          <hr>
            <div class="col-sm-5 col-md-5 sidebar">
          <h3>Comment</h3>
          <form method="POST">
            <textarea type="text" class="form-control" id="commenttxt"></textarea><br>
            <input type="hidden" id="postid" value="<?php echo $post->post_Id; ?>">
            <input type="hidden" id="userid" value="<?php echo $post->user_Id; ?>">
            <input type="submit" id="save" class="btn btn-success pull-right" value="Comment">
          </form>
        </div>
    </div>

		<div class="my-quest" id="quest">
            <div> 
                <form method="POST" action="<?=base_url('question/new');?>">
                        
                         <label>Category</label>
                        <select name="category" class="form-control">
                            <option></option>
                            <option value="Programming">Programming</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Computer Networking">Computer Networking</option>
                        </select>
                        <label>Topic Title</label>
                        <input type="text" class="form-control" name="title"required>
                        <label>Content</label>
                        <textarea name="content"class="form-control">

                        </textarea>
                       <br>
                        <input type="submit" class="btn btn-success pull-right" value="Post">
                   </form><br>
                <hr>
                  <a href="" class="pull-right">Close</a>
              </div>
        </div>
</body>
<script>

$("#save").click(function(){
var postid = $("#postid").val();
var userid = $("#userid").val();
var comment = $("#commenttxt").val();
var datastring = 'postid=' + postid + '&userid=' + userid + '&comment=' + comment;
if(!comment){
  alert("Please enter some text comment");
}
else{
  $.ajax({
    type:"POST",
    url: "<?=base_url('post/addcomment');?>",
    data: datastring,
    cache: false,
    success: function(result){
      document.getElementById("commenttxt").value=' ';
      $("#comments").append(result);
    }
  });
}
return false;
})

</script>
</html>