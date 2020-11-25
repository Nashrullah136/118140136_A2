<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <link rel="stylesheet" type="text/css" href="css/style.css">    
</head>    
<body>    
    <h2>Login Page</h2><br>    
    <?php if(isset($validation)){
        echo $validation->listErrors();
    }?>
    <div class="login">    
    <form id="login" method="POST" action="<?= route_to('auth')?>">    
        <table>
            <tr>
                <td>
                    <label><b>Username</b></label>    
                </td>
                <td>
                    <input type="text" name="username" id="Uname" placeholder="Username">
                </td>
            </tr>
            <tr>
                <td>
                    <label><b>Password</b></label>
                </td>
                <td>
                    <input type="Password" name="password" id="Pass" placeholder="Password">    
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2">
                    <input type="submit" name="log" id="log" value="Log In">       
                </td>
            </tr>
        </table>
    </form>
</div>  
</body>
<style>
.login {
    margin: auto;
    width: fit-content;
}
h2{
    margin: auto;
    width: fit-content;
}
</style>   
</html>     