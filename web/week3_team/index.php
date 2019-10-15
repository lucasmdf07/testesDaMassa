<!doctype html>
<html>
    <head>
        <title>Group 3 Rocks!</title>
    </head>
    <body>
    
        <form action="hello.php" method="post">
            
            <p><label for="name">Name:</label><input type="text" name="name" id="name"></p>
            
            <p><label for="email">Email</label>
                <input type="text" name="email" id="email">
            </p>
            
            <p>Your Major:<br>
            <?php
                $majors[] = "Computer Science";
                $majors[] = "Web Design and Development";
                $majors[] = "Computer information Technology";
                $majors[] = "Computer Engineering";
                
                foreach($majors as $m){
            ?>
                    <label><input type="radio" name="major" value="<?php echo  $m; ?>" required><?php echo $m;?></label><br>     
            <?php
                }
            ?>
            </p>
            
            <p>Continents you have visited<br>
            <?php 
                $continents['na'] = "North America";
                $continents['sa'] = "South America";
                $continents['eu'] = "Europe";
                $continents['as'] = "Asia";
                $continents['au'] = "Australia";
                $continents['af'] = "Africa";
                $continents['an'] = "Antarctica";
                
                foreach($continents as $key => $value){
            ?>
                    <label><input type="checkbox" name="continents[]" value="<?php echo  $key; ?>"><?php echo $value;?></label><br>     
            <?php
                }
            ?>
            </p>
            
            <p>
                <label for="comments">Your Comments</label><br><textarea name="comments" placeholder="type your comments here" rows="6" cols="40"></textarea>
            </p>
            
            <p>
                <input type="submit" value="submit">
            </p>
        </form>
        
    </body>
</html>