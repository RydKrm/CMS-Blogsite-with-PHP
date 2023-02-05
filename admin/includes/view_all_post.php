<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th> Post_id</th>
                            <th>Catagory_id</th>
                            <th>Post_title</th>
                            <th> Author</th>
                            <th> Date</th>
                            <th> Image</th>
                            <th> Content</th>
                            <th> Post_Tag</th>
                            <th> Comment_count</th>
                            <th> status</th>
                            <th> user</th>
                            <th> View</th>
                        </tr>
                    </thead>
                    <tbody>
             <?php 
               $query = "SELECT * FROM posts";
               $connection = mysqli_connect('localhost','root','','cms');
               $post_query = mysqli_query($connection,$query);
               while($row = mysqli_fetch_assoc($post_query)){
                   $post_id = $row['post_id'];
                   $post_catagory_id = $row['post_catagory_id'];
                   $post_title = $row['post_title'];
                   $post_author = $row['post_author'];
                   $post_date = $row['post_date'];
                   $post_img = $row['post_image'];
                   $post_content = $row['post_content'];
                   $post_tag = $row['post_tags'];
                   $post_comment_count = $row['post_comment_count'];
                   $post_status = $row['post_status'];
                   $post_user =$row['post_user'];
                   $post_view = $row['post_view'];
               }
                   echo "<tr>";
                   echo "<td>$post_id</td>";
                   echo "<td>$post_catagory_id</td>";
                   echo "<td>$post_title</td>";
                   echo "<td>$post_author</td>";
                   echo "<td>$post_date</td>";
                   echo "<td><img src='images/$post_img'></td>";
                   echo "<td>$post_content</td>";
                   echo "<td>$post_tag</td>";
                   echo "<td>$post_comment_count</td>";
                   echo "<td>$post_status</td>";
                   echo "<td>$post_user</td>";
                   echo "<td>$post_view</td>";
                   echo "</tr>";

                 
             ?>
             

                    </tbody>
                    </table>