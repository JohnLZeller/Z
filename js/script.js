// ===============================================================
// * Filename: script.js
// * Author: John Zeller
// * Date Created: December 5, 2012
// * Recently Updated: December 5, 2012
// * ------
// * Notes:
// * 
// * =============================================================

function user_info_change(login_or_reg){
    if(login_or_reg=='login'){
        user_info.innerHTML = login_view;
    }else if(login_or_reg=='register'){
        user_info.innerHTML = register_view;
    }
}

function site_info_change(data){
    site_info.innerHTML = data;
}


// HTML Spans are placed down here to separate them from the javascript functions //

var login_view = "                                                              \
    <form id='login_form' action='' method='post'>                              \
        <input type='hidden' name='type' value='login'>                         \
        Username<br>                                                            \
        <input type='text' name='username'><br><br>                             \
        Password<br>                                                            \
        <input type='text' name='password'><br><br><br>                         \
        <input name='login_submit' type='submit' value='Log In'>                \
    </form>                                                                     \
    <br>Are you a new user?<br>                                                 \
    <a href='javascript:user_info_change(\"register\");'>Register Here!</a>"  

var register_view = "                                                           \
    <form id='register_form' action='' method='post'>                           \
        <input type='hidden' name='type' value='register'>                      \
        <h2>Register Now</h2><br>                                               \
        Username<br>                                                            \
        <input type='text' name='username'><br><br>                             \
        Password<br>                                                            \
        <input type='text' name='password'><br><br>                             \
        First Name<br>                                                          \
        <input type='text' name='fname'><br><br>                                \
        Last Name<br>                                                           \
        <input type='text' name='lname'><br><br>                                \
        Birthday<br>                                                            \
        <input type='date' name='dob'><br><br>                                  \
        Gender<br>                                                              \
        <input type='radio' name='gender' value='male'> Male<br>                \
        <input type='radio' name='gender' value='female'> Female<br><br>        \
        Email<br>                                                               \
        <input type='email' name='email'><br><br><br>                           \
        <input name='register_submit' type='submit' value='Register'>           \
    </form><br><br>                                                             \
    Already registered? <br><a href='javascript:user_info_change(\"login\");'>Click Here to Log In</a>"  