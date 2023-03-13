
<?php 

include("mysql-helper.php");
include_once("requestHelper.php");
global $connection;

if(isset($_POST['submit']))
{

     echo "Is Submit";
     $id  = fieldsValue('id');
     $name = fieldsValue('name');
     $email = fieldsValue('email');
     $phone = fieldsValue('phone');
     $comments = fieldsValue('comments');

 echo $name;
 echo $email;
        $record = array("name"=>$name, "email"=>$email,"phone"=>$phone,"comments"=>$comments);
    
     
        
        addRecord($record,'contact_form_info');
        

 }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <title>customer info</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <div id="top1">
        <div class="t1txt">
            User Information
        </div>
    </div>
    <div id="top">
        <div class="icon_text">
            <img src="icon.png" width="120" height="100">
            <h3>
               <i> Spirtual Books for learning ethical and&nbsp;</i> 
            </h3>
        </div>
        <div class="class_h4">
            <h3>
                <i> moral values</i>
            </h3>
        </div>

        <div class="class_a">
            <a href = "HOME.html"> SHOP&nbsp; </a>
            <a href = "ABOUT.html"> MULTI MEDIA&nbsp; </a>
            <a href = "CONTACT.html"> CONTACT US</a>
        </div>

        <!--<div class="u_icon">
            <i class="fa fa-shopping-cart black-color" aria-hidden="true"></i>&nbsp;
            <i class="fa fa-user black-color " ></i>
        </div>-->
        <div class="search">
            <label for="Search" ></label>
            <input type="text" name="Search" placeholder="Search" required>
        </div>  
    </div>
    
        
        <form name="contact-form" action="#" method="post" id="contact-form">

        
            <div class="form_group">
                <label for="Name" ><i> Enter your name:</i></label>
                <input type="text" name="name" placeholder="Your Name" required>
            </div>
         
        
            <div class="form_group1">
                <label for="exampleInputEmail1"><i> Enter your E-mail:</i></label>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            
            <div class="form_group2">
                <label for="Phone"><i> Enter your Phone Number:</i></label>
                <input type="text" name="phone" placeholder="Phone" required>
            </div>
                        
            <div class="form_group3">
                <label for="comments"><i> Comments:</i></label>
                <textarea name="comments" rows="3" cols="28" rows="5" placeholder="Comments"></textarea> 
            </div>

            <button type="submit" class="btn" name="submit" value="Submit" id="submit_form"><i>Submit</i> </button>
            
            <img src="img/loading.gif" id="loading-img">

        </form>

        <div id="bottom">
            <div class="btext">
                *Prices do not include postage
            </div>
            <div class="btext1">
                Publishing Word &copy; - All Rights Reserved
            </div>

        </div>
                <div class="response_msg"></div>
           

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
                <script>
                    $(document).ready(function()
                    {
                        $("#contact-form").on("submit",function(e)
                        {
                            e.preventDefault();
                            if($("#contact-form [name='your_name']").val() === '')
                            {
                                $("#contact-form [name='your_name']").css("border","1px solid red");
                            }
                            else if ($("#contact-form [name='your_email']").val() === '')
                            {
                                $("#contact-form [name='your_email']").css("border","1px solid red");
                            }
                            else
                            {
                                $("#loading-img").css("display","block");
                                var sendData = $( this ).serialize();
                                $.ajax
                                ({
                                    type: "POST",
                                    url: "get_response.php",
                                    data: sendData,
                                    success: function(data)
                                    {
                                        $("#loading-img").css("display","none");
                                        $(".response_msg").text(data);
                                        $(".response_msg").slideDown().fadeOut(3000);
                                        $("#contact-form").find("input[type=text], input[type=email], textarea").val("");
                                    }
                                });
                            }
                        });
                        
                        $("#contact-form input").blur(function()
                        {
                            var checkValue = $(this).val();
                            if(checkValue != '')
                            {
                                $(this).css("border","1px solid #eeeeee");
                            }
                        });
                    });
                </script>

                <!--Add you text here-->
                <div class="dummy_txt">
                    <p>Dummy text_Add your text here</p>
                </div>
                <div class="contact">
                    <h3><u>Find Us here:</u></h3>
                </div>
                <div class="contact1">
                    <a href="email_of_official_website@abc.com">email_of_official_website@abc.com</a>
                </div>

</body>
</html>