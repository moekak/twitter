<?php
require_once dirname(__FILE__) . "../../app/controller/getPostsController.php";

$postData;
$path = "./images/";

// $like = new postService();

// $path = "./images/";

// echo $_SESSION["user_id"];
// $post = $_SESSION["postData"];

// $counts = $_SESSION["likesCount"];
// $userName = $_SESSION["username"];
// $userEmail = $_SESSION["email"];
// $userIcon = $_SESSION["icon"];

// $userId = "";
// if ($_SESSION["user_id"]) {
//     $userId = $_SESSION["user_id"];
// }
// echo $_SESSION["user_id"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style/index.css">
    <link rel="stylesheet" href="../assets/style/common.css">
    <link rel="stylesheet" href="../assets/style/signup.css">
    <style>
    #style {
        color: <?=$_SESSION["likeStyle"][1]?>;
    }
    </style>
    <script src="https://kit.fontawesome.com/49c418fc8e.js" crossorigin="anonymous"></script>
</head>

<body class="contents1800">
    <div class="bg-gray js_modal_bg hidden" ></div>
    <div class="main-area relative">
        <div class="nav-wrapper">
            <i class="fab fa-twitter"></i>
            <div class="social-icon-container hover2">
                <i class="fas fa-search"></i>
                <p>Explore</p>
            </div>
            <div class="social-icon-container hover3">
                <i class="fas fa-cog"></i>
                <p>Settings</p>
            </div>
        </div>
        <main class="wrapper">
            <h3 class="explore">Explore</h3>
            <?php foreach ($postData as $post): ?>
            <div class="post-container" data-post-id="<?php echo $post["id"] ?>">
                <div class="post-container-left relative">
                    <?php if ($post["icon"]) {?>
                    <img src="<?php echo $path . $post["icon"] ?>" alt="" class="avatar">
                    <?php } else {?>
                    <img src="../assets/img/user-dummy.png" alt="" class="avatar">
                    <?php }?>

                </div>
                <div class="post-container-right relative">
                    <div class="flex">
                        <p class="bold padding_r40"><?=$post["name"]?></p>
                        <p class="gray padding_r20"><?=$post["login_name"]?></p>
                        <?php
                            $date = $post["created_at"];
                            $timestamp = strtotime($date);
                            $day = date("Y/m/d", $timestamp);
                        ?>
                        <p class="gray padding_r20">.</p>
                        <p class="gray"><?=$day?></p>
                    </div>
                    <p class="body"><?=$post["body"]?></p>
                    <div class="icon-section">
                        <div class="comment-icon">
                            <i class="far fa-comment gray"></i>
                            <a class="comment gray"><?=$post["comments_count"]?></a>
                        </div>
                        <div class="like-icon">
                            <div type="submit" class="like-btn" data-post-id="<?php echo $post["id"] ?>">
                                <i class="far fa-heart gray"></i>
                                <div class="post gray" id="<?php echo $post["id"] ?>">
                                    <p class="likeCount gray"><?php echo $post["likes_count"] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="dislike-container">
                            <div type="submit" class="dislike-btn" data-post-id="<?php echo $post["id"] ?>">
                                <i class="far fa-thumbs-down gray"></i>
                                <p class="gray">not interested</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>

        </main>
    </div>

    <div class="signup-wrapper">
        <div class="left">
            <h3 class="font_2">Don't miss what's happening.</h3>
            <p>People on Twitter are the first to know.</p>
        </div>
        <div class="right">
            <div class="login-btn">
                Log in
            </div>
            <div class="signup-btn" id="js_signup-btn">
                Sign up
            </div>
        </div>
    </div>



    <!-- サインアップモーダル -->
    <div class="register-wrapper" id="js_register">
        <div class="register-step-first relative hidden" id="js_step_first">
            <div class="close-btn bold">×</div>
            <div class="top-container">
                <i class="fab fa-twitter"></i>
                <h2>Join Twitter today</h2>
            </div>
            <div class="padding_t50"></div>
            <div class="bottom-container">
                <div class="google">
                    <button>
                        <div class="icon-left">
                            <img src="../assets/img/user-dummy.png" alt="" class="user-icon-google">
                        </div>
                        <div class="right-name">
                            <p>Sign in as moeka</p>
                        </div>
                        <div class="google-icon">
                            <i class="fab fa-google"></i>
                        </div>
                    </button>
                </div>
                <div class="apple">
                    <button>
                        <div class="icon-left">
                            <i class="fab fa-apple"></i>
                        </div>
                        <div class="right-name apple-text">
                            <p>Sign up with Apple</p>
                        </div>
                    </button>
                </div>
                <div class="border"><span>――――――――</span> or <span>――――――――</span></div>
                <div class="create-account">
                    <button id="js_create-btn">Create account</button>
                </div>
                <p class="policy">By signing up, you agree to the <span> Terms of Service</span>and <span> Privacy
                        Policy,</span>including<span> Cookie Use.</span></p>
                <div class="login-ask">
                    <p>Have an account already? <a href="">Log in</a></p>
                </div>
            </div>

        </div>
        <!-- step 2 -->
        <div class="register-step-second relative hidden" id="js_step_second">
            <div class="close-btn bold">×</div>
            <div class="step-second-section">
                <h3>Step 1 of 3</h3>
                <h2>Create your account</h2>
                <div class="relative input-container">
                    <input type="text" class="input-name relative" name="useranme" placeholder="Name" maxlength="50" id="js_name_input">
                    <p class="count absolute"></p>
                    <input type="text" class="input-phone relative" name="phonenumber" placeholder="Phone" id="js_phone_input">
                    <p class="alert-phone hidden" id="js_alert1">Please enter a valid phone number.</p>
                    <p class="alert-phone2 hidden" id="js_alert2">This number is already in use with other accounts. Please use another.
                    </p>
                </div>
                <div class="date-of-birth-container">
                    <h4>Date of birth</h4>
                    <p>This will not be shown publicly. Confirm your own age, even if this account is for a
                        business, a
                        pet, or something else.</p>
                    <div class="select-container">
                        <select name="month" id="js_month">
                            <option selected disabled>Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        <select name="day" id="js_day">
                            <option selected disabled>Day</option>
                            <?php for ($i = 1; $i < 32; $i++) {?>
                            <option value="<?=$i?>"><?=$i?></option>
                            <?php }?>
                        </select>
                        <select name="year" id="js_year">
                            <option selected disabled>Year</option>
                            <?php for ($i = 1903; $i < 2023; $i++) {?>
                            <option value="<?=$i?>"><?=$i?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="next-btn-container absolute">
                <button class="next-btn" id="js_nextBtn1">Next</button>
            </div>
        </div>
        <!-- step 3 -->
        <div class="register-step-third relative hidden" id="js_step_third">
            <div class="return1">←</div>
            <div class="step-third-section">
                <h3>Step 2 of 3</h3>
                <h2>Create your account</h2>
                <div class="relative">
                    <input type="text" class="input-name-check" name="username" placeholder="Name" maxlength="50">
                    <i class="fas fa-check-circle absolute checked1"></i>
                    <i class="fas fa-times absolute close1"></i>
                    <input type="text" class="input-phone-check" name="phonenumber" placeholder="Phone">
                    <i class="fas fa-check-circle absolute checked2"></i>
                    <i class="fas fa-times absolute close2"></i>
                    <input type="text" class="input-birthday-check" name="birthday" placeholder="Date of birth">
                    <i class="fas fa-check-circle absolute checked3"></i>
                    <i class="fas fa-times absolute close3"></i>
                    <p class="alert">By signing up, you agree to the <a href="">Terms of Service</a> and <a
                            href="">Privacy
                            Policy</a>, including <a href="">Cookie Use</a>. Twitter
                        may use your contact information, including your email address and phone number for
                        purposes
                        outlined in our Privacy Policy, like keeping your account secure and personalizing our
                        services,
                        including ads. <a href="">Learn more.</a> Others will be able to find you by email or
                        phone number,
                        when provided,
                        unless you choose otherwise <a href="">here</a>.</p>
                </div>
            </div>
            <div class="next-btn-container absolute">
                <button class="signUp-btn" type="submit">Sign up</button>
            </div>
        </div>
        <!-- step4 -->
        <div class="register-step-forth relative hidden">
            <div class="close-btn bold">×</div>
            <div class="step-forth-section">
                <h3>Step 3 of 3</h3>
                <h2>Create your password</h2>
                <div class="relative">
                    <!-- <form action="./session/app/controller/SignupController.php" method="post"> -->
                    <input type="password" class="input-password" name="username" placeholder="password" maxlength="30">
                    <div class="length-check">
                        <i class="fas fa-check"></i>
                        <p>at least 8 characters long</p>
                    </div>
                    <div class="contain-lower">
                        <i class="fas fa-check"></i>
                        <p>at least one lowercase letter</p>
                    </div>
                    <div class="contain-upper">
                        <i class="fas fa-check"></i>
                        <p>at least one uppercase letter</p>
                    </div>
                    <div class="contain-num">
                        <i class="fas fa-check"></i>
                        <p>at least one number</p>
                    </div>
                    <div class="contain-special">
                        <i class="fas fa-check"></i>
                        <p>at least one special character</p>
                    </div>
                </div>
            </div>
            <div class="next-btn-container absolute">
                <a href="#five" onclick="location.reload();"><button class="next-btn" type="submit">Submit</button></a>
            </div>

        </div>

    </div>
    <script src="../js/signup.js"></script>
</body>