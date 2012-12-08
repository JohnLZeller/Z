// ===============================================================
// * Filename: script.js
// * Author: John Zeller
// * Date Created: December 5, 2012
// * Recently Updated: December 7, 2012
// * ------
// * Notes:
// * 
// * =============================================================

function start(){
    user_info_change('login');
}

function user_info_change(login_or_reg){
    if(login_or_reg=='login'){
        user_info.innerHTML = login_view;
    }else if(login_or_reg=='register'){
        user_info.innerHTML = register_view;
        site_info.innerHTML = register_guidelines;
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
        Username<font color='red'>*</font><br>                                  \
        <input type='text' name='username'><br><br>                             \
        Password<font color='red'>*</font><br>                                  \
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

var register_guidelines = "<font size='2'>                                          \
    <h2>Registration Guidelines</h2>		                                    \
    <font color='red'>*</font> = <font color='red'>REQUIRED</font><br>		    \
    <h3>Username<font color='red'>*</font>:</h3>                                    \
            Must <b>not</b> be longer than 30 characters.<br>                       \
            Must contain <b>only</b> numbers and letters.<br>			    \
            <i>Example: beerfreak98</i><br>					    \
    <h3>Password<font color='red'>*</font>:</h3>                                    \
            Must <b>between</b> 6 and 30 characters.<br>                            \
            Must contain <b>only</b> numbers, letters and symbols. NO spaces.<br>   \
            <i>Example: 1928kkj$%^</i><br>					    \
    <h3>First Name:</h3>                                                            \
            Must <b>not</b> be longer than 40 characters.<br>                       \
            Must contain <b>only</b> letters.<br>                                   \
            <i>Example: Abraham</i><br>                                             \
    <h3>Last Name:</h3>                                                             \
            Must <b>not</b> be longer than 40 characters.<br>                       \
            Must contain <b>only</b> letters.<br>                                   \
            <i>Example: Lincoln</i><br>                                             \
    <h3>Birthday:</h3>								    \
            Must be <b>exactly</b> 10 characters long.<br>                          \
            Must be in the form MM-DD-YY.<br>                                       \
            <i>Example: 01-01-88</i><br>                                            \
    <h3>Gender:</h3>								    \
            You can only choose one, it's pretty self-explanatory.<br>              \
    <h3>Email:</h3>                                                                 \
            Must <b>not</b> be longer than 100 characters.<br>                      \
            Must be in the work user@email.com.<br>			            \
            Must be a valid email address.<br>			                    \
            <i>Example: abraham.lincoln@gmail.com</i><br></font>"