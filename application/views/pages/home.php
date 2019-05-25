
    <div class="container" style="margin:7% auto;">
    	<h4>Latest Discussion</h4>
    	<hr>
        <?php 
                        $cats = $this->home_model->get_all_category();
                        foreach($cats as $cat)
                        {?>
<div class="panel panel-success">
                    <div class="panel-heading">
                        
                            <h3 class="panel-title"><?=$cat['category'];?></h3>

</div>
<div class="panel-body">
    <table class="table table-stripped">
        <tr>
            <th>Topic title</th>
            <th>Category</th>
            <th>Action</th> 
        </tr>
        <?php
                    $posts = $this->home_model->get_posts_by_category($cat['category']);
                    // var_dump($posts);die();
                    foreach($posts as $post)
                    {
                        ?>
        <tr>
            <td><?=$post['title'];?></td>
            <td><?=$cat['category'];?></td>
            <td><a href="<?=base_url('post/'.$post['post_Id']);?>"><button class="btn btn-success">View</button></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                    </div>
                </div>

            <?php
            }
            ?>
		<div class="my-quest" id="quest">
            <div> 
                <form method="POST" action="<?=base_url('question/new');?>">
                        
                         <label>Category</label>
                        <select name="category" class="form-control">
                            <option></option>
                            <?php 
                            $cats = $this->home_model->get_all_category();
                            foreach ($cats as $cat) {
                                echo '<option value='.$cat['cat_id'].'>'.$cat['category'].'</option>';
                            }
                            ?>
                        </select>
                        <label>Topic Title</label>
                        <input type="text" class="form-control" name="title"required>
                        <label>Content</label>
                        <textarea name="content"class="form-control">
                        </textarea>
                       <br>
                        <input type="hidden" name="userid" value=<?php echo $user_ID; ?>>
                        <input type="submit" class="btn btn-success pull-right" value="Post">
                   </form><br>
                <hr>
                  <a href="#" class="pull-right">Close</a>
              </div>
        </div>



</body>
</html>