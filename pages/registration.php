<?php
    if(!isset($_POST['button'])){
?>

<form action='index.php?page=2' method='POST' style='margin-top:30px' enctype="multipart/form-data">
    <input name='login' class="form-control" type='text' placeholder="login"/><br/>
    <input name='password'  type='password' class="form-control" placeholder="password"/><br/>
    <input name='password2' type='password' class="form-control" placeholder="repeate password"/><br/>
    
    <div style="margin-bottom: 30px">
        <label for='filesave'>Choose file</label>
        <input type="hidden" name='MAX_FILE_SIZE' value="4194304"/>
        <input type='file' class="form-control" name='image' accept='images/*'/>
    </div>
    <input name='email' type='email' class="form-control" placeholder="email@mail.com"/><br/>
    <div class="d-grid gap-2">
        <button type='submit' name='button' value='button' class=" btn btn-primary">Регистрация</button>
    </div>
    
</form>

<?php  
    }
    else
    {
       include_once('helpers/adduser.php'); 
    }
    
?>