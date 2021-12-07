<?php?>
<?php
session_start();
require_once("connect.php");
require_once("phpController.php");
$semammount=get_marks();
//регистрация
if (isset($_POST['Reg'])){ 
$ch=false;
 $password = $_POST['password'];
 $password1 = $_POST['password1'];
 $sele=$_POST['select'];
 $login = $_POST['username'];
 if (empty($login)) {
    echo "<script>alert(\"Введите пароль для авторизации\");</script>";
	$ch=true;
	}
	if($ch==false)
if (empty($password) or empty($password1) ){
    echo "<script>alert(\"введите пароль дважды\");</script>";
	$ch=true;
	}

	if($ch==false)
 if(strlen($password) > 18 or strlen($password) <4){
    echo "<script>alert(\"Пароль должен содеражить от 4 до 18 символов\");</script>"; 
	$ch=true;
	}
 $password = htmlspecialchars($password);
 $password1 = htmlspecialchars($password1);
if($ch==false)
if($password != $password1){
    echo "<script>alert(\"Пароли не совпадают\");</script>";
	$ch=true;
}
else{
if($ch==false){
mysqli_query($link, "INSERT INTO users SET Login='$login', Password='$password',  Group_n='$sele',Allowment='0'") or die(mysqli_error($link)); 
echo "<script>alert(\"Регистрация прошла успешно.\",$password);</script>"; 
}
}
echo "<script>window.location.href='./index.php'</script>";
}
//удаление
if (isset($_GET['del']))
{
    $dd = $_GET['del'];
    mysqli_query($link, "DELETE FROM hospitals WHERE  ID='$dd'") or die(mysqli_error($link)); 
}
//Выйти
if (isset($_GET['exe']))
{
   $_SESSION["ID"]=null;
   $_SESSION["login"]=null;
   $_SESSION["level"] = null; 
   echo "<script>window.location.href='./index.php'</script>";
}
//Авторизация 

if (isset($_POST['log'])){ 
$ch=false;
$login = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT Password,Allowment,ID FROM users WHERE Login='$login'";
$result = mysqli_query ($link , $query);
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; foreach ($data as $elem) { 
 $try =  $elem['Password'] ; 
 $level = $elem['Allowment'] ; 
 $USer_ID= $elem['ID'] ; 
} 
if(empty($try)){
 echo "<script>alert(\"Не найдено пользователя с заданным логином.\");</script>"; 
 $ch=true;
}
if ($ch==false)
if($try != $password){
echo "<script>alert(\"Неверный пароль\");</script>"; 
$ch=true;
}

if($ch==false ){
 $_SESSION['ID'] = $USer_ID;
 $_SESSION["login"] = $login; //Записываем в сессию логин пользователя
 $_SESSION["level"] = $level; 
 echo "<script>alert(\"авторизация выполнена успешно.\");</script>"; 
}
 echo "<script>window.location.href='./index.php'</script>";
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
 <?php
  if (isset($_GET['select_fir']))
{
    $fir = $_GET['select_fir'];
}
  if (isset($_REQUEST['addcheck']))
{
    $try = $_REQUEST['addcheck'];
    if($try=="add"){
        if(!empty($_SESSION['login'])){
            $subj = $_REQUEST['subject'];
            $use = $_REQUEST['Name'];
            $mark = $_REQUEST['Mark'];
            $date = $_REQUEST['date'];
            $login=$_SESSION['login'];

        }
    }
}
?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Главная</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Главная.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Главная">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Главная">
    <meta property="og:type" content="website">
    <script>
        function add(){
        var element = document.getElementById("hh");
        element.value = 'add';
        }
    </script>
  </head>
  <body class="u-body u-overlap"><header class="u-clearfix u-header u-header" id="sec-7ec3"><div class="u-clearfix u-sheet u-sheet-1">
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</symbol>
</defs></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" style="padding: 10px 20px;">Главная</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-dialog-link" href="#sec-784b" style="padding: 10px 20px;">Авторизация</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" style="padding: 10px 20px;">Главная</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-dialog-link" href="#sec-784b" style="padding: 10px 20px;">Авторизация</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-clearfix u-gradient u-section-1" id="sec-0cbe">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-17 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <div class="u-container-style u-group u-image u-preserve-proportions u-radius-15 u-shape-round u-image-1" data-image-width="400" data-image-height="265">
                    <div class="u-container-layout u-container-layout-2"></div>
                  </div>
                  <?php
                    if(empty($_SESSION['login'])){
                    $level=0;
                    ?>
                     <a href="#sec-784b" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-light-2 u-radius-11 u-btn-34 u-dialog-link">Войти</a>
                    <?php
                    }else{
                    $level=$_SESSION['level'];
                    $User_ID=$_SESSION['ID'];
                    ?>
                      <div class="u-container-style u-group u-palette-1-light-2 u-radius-15 u-shape-round u-group-2">
                        <div class="u-container-layout u-container-layout-3">
                          <a href="index.php?exe=t" class="u-border-none u-btn u-button-style u-none u-btn-1 "><span class="u-icon u-icon-1"><svg class="u-svg-content" viewBox="0 0 512.00533 512" style="width: 1em; height: 1em;"><path d="m298.667969 277.335938c-35.285157 0-64-28.714844-64-64 0-35.285157 28.714843-64 64-64h42.664062v-85.332032c0-35.285156-28.714843-63.99999975-64-63.99999975h-229.332031c-7.019531 0-13.589844 3.45312475-17.578125 9.23437475-3.96875 5.78125-4.863281 13.144531-2.347656 19.691407l154.667969 405.335937c3.136718 8.277344 11.070312 13.738281 19.925781 13.738281h74.664062c35.285157 0 64-28.714844 64-64v-106.667968zm0 0" fill="#2196f3"></path><path d="m397.164062 318.382812c-7.957031-3.308593-13.164062-11.09375-13.164062-19.714843v-64h-85.332031c-11.777344 0-21.335938-9.554688-21.335938-21.332031 0-11.777344 9.558594-21.332032 21.335938-21.332032h85.332031v-64c0-8.621094 5.207031-16.40625 13.164062-19.714844 7.976563-3.304687 17.152344-1.46875 23.25 4.632813l85.335938 85.332031c8.339844 8.339844 8.339844 21.824219 0 30.164063l-85.335938 85.335937c-6.097656 6.097656-15.273437 7.933594-23.25 4.628906zm0 0" fill="#607d8b"></path><path d="m184.449219 44.84375-128.191407-42.730469c-28.929687-8.894531-56.257812 12.460938-56.257812 40.554688v384c0 18.242187 11.605469 34.519531 28.886719 40.492187l128.167969 42.730469c4.714843 1.449219 9.046874 2.113281 13.613281 2.113281 23.53125 0 42.664062-19.136718 42.664062-42.667968v-384c0-18.238282-11.605469-34.515626-28.882812-40.492188zm0 0" fill="#64b5f6"></path></svg><img></span>
                          </a>
                          <h5 class="u-custom-font u-font-courier-new u-text u-text-default u-text-grey-80 u-text-1"><?php echo $_SESSION['login']?><span class="u-icon"></span>&nbsp;
                          </h5>
                        </div>
                      </div>
                  <?php
                    }
                   ?>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-43 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-4">
                <h1 class="u-custom-font u-font-roboto-slab u-text u-text-default u-text-2">Электрическая зачётка</h1>
                  <div class="u-container-style u-expanded-width u-gradient u-group u-radius-15 u-shape-round u-group-3">
                    <div class="u-container-layout u-container-layout-5">
                      <img class="u-image u-image-default u-image-2" src="images/7-78606_book-clipart-black-and-white-png-books-black.png" alt="" data-image-width="860" data-image-height="808">
                      <h3 class="u-text u-text-default u-text-2">У вас нет долгов</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-gradient u-section-2" id="sec-1a6d">
      <div class="u-clearfix u-sheet u-sheet-1">
         <!--Окно таблицы-->
        <div class="u-expanded-width u-tab-links-align-left u-tabs u-tabs-1">
          <ul class="u-border-2 u-border-palette-1-base u-spacing-10 u-tab-list u-unstyled" role="tablist">
            <?php
	        for ($x=1;$x <= $semammount ; $x++){
                if($x==1){$state='true';$s='active';}else{$state='false';$s='';}
            ?>
            <li class="u-tab-item" role="presentation">
              <a class="<?php echo $s ?> u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-2" id="link-tab-14b7" href="#t<?php echo $x ?>" role="tab" aria-controls="t<?php echo $x ?>" aria-selected="<?php echo $state ?>">семестр <?php echo $x ?></a>
            </li>
            
            <?php
            }
            ?>
          </ul>
          <div class="u-tab-content">
              <!--содержимое вкладки-->
              <?php
	            for ($x=1;$x <= $semammount ; $x++){
                    if($x==1){$state='u-tab-active ';}else{$state='';} 
               ?>   
              <div class="<?php echo $state ?>u-align-left u-container-style u-tab-pane u-white u-tab-pane-2" id="t<?php echo $x ?>" role="tabpanel" aria-labelledby="t<?php echo $x ?>">
              <div class="u-container-layout u-valign-top u-container-layout-1">
                <h4 class="u-text u-text-default u-text-1">Семестр <?php echo $x ?></h4>
                <div class="u-table u-table-responsive u-table-1">
                  <table class="u-table-entity">
                     <colgroup>
                      <col width="8%">
                      <col width="38%">
                      <col width="8%">
                      <col width="23%">
                      <col width="23%">
                    </colgroup>
                    <tbody class="u-table-alt-grey-5 u-table-body">
                        
                     <?php
                        echo get_table($x);
                      ?>
                     </tbody>
                  </table>
                </div>
              </div>
            </div>
              <?php
                }
                ?>
              <!--содержимое вкладки-->
          </div>
        <!--таб контент-->
        </div>
          <!--Окно таблицы-->
      </div>
      <!--Добавить запись-->
    </section>
     <section class="u-align-center u-clearfix u-palette-1-light-2 u-section-3" id="sec-d192">
      <div class="u-clearfix u-sheet u-sheet-1">
      <?php
        if($level!=0){
        ?>
        <div class="u-form u-form-1">
          <form action="" method="GET" class="u-clearfix u-form-horizontal u-form-spacing-15 u-inner-form" style="padding: 15px" source="custom">
            <div class="u-form-group u-form-select u-form-group-1">
                      <label for="select-0352" class="u-form-control-hidden u-label"></label>
                      <div class="u-form-select-wrapper">
                        <select onchange="this.form.submit()" id="select_fir" name="select_fir" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-1">
                          <?php
                            $res="";


                            $quer = "SELECT ID FROM by_subjects WHERE Teacher=(SELECT ID FROM users WHERE login='$login')";
                            $result = mysqli_query($GLOBALS['link'], $quer) or die(mysqli_error($link));
                            for ($da = []; $row = mysqli_fetch_assoc($result); $da[] = $row); $result = ''; 
                            foreach ($da as $el) { 
                                    $ap=$el['ID'];
                                    $query = "SELECT Group_n FROM Grops_teachers WHERE purpose ='$ap'";
                                    $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
                                    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; 
                                    foreach ($data as $elem) { 
                                        $nu=$elem['Group_n'];
                                        $query = "SELECT * FROM groups WHERE ID='$nu'";
                                        $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
                                        for ($dat = []; $row = mysqli_fetch_assoc($result); $dat[] = $row); $result = ''; 
                                            foreach ($dat as $ele) {  
                                                if($ele['Group_n']!=$prev){
                                                    $res .= '<option value="'. $ele['ID'] .'">'. $ele['Group_n'] .'</option>'; 
                                                }
                                            $prev=$ele['Group_n'];
                                            } 
                                    } 
                                } 
                    

                            echo $res;       
                          ?>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>
            <div class="u-form-group u-form-select u-form-group-1">
              <label for="select-0352" class="u-form-control-hidden u-label"></label>
              <div class="u-form-select-wrapper">
                <select id="select-0352" name="subject" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-1">
                  <?php
                    $fir=(int)$fir;
                    $quer = "SELECT * FROM grops_teachers WHERE Group_n='$fir'";
                            $result = mysqli_query($GLOBALS['link'], $quer) or die(mysqli_error($link));
                            for ($da = []; $row = mysqli_fetch_assoc($result); $da[] = $row); $result = ''; 
                            foreach ($da as $el) {
                                    $ap=$el['purpose'];
                                    
                                    $query = "SELECT * FROM by_subjects WHERE ID ='$ap'";
                                    $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
                                    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; 
                                    foreach ($data as $elem) { 
                                        $nu=$elem['Teacher'];
                                        $sub=$elem['Subject'];
                                        if ($nu==$User_ID){
                                            $query = "SELECT * FROM subject_list WHERE ID='$sub'";
                                            $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
                                            for ($dat = []; $row = mysqli_fetch_assoc($result); $dat[] = $row); $result = ''; 
                                                foreach ($dat as $ele) {
                                                        $res2 .= '<option value="'. $ele['subject'] .'|'. $ele['semester'] .'">'. $ele['subject'] .'</option>'; 
                                                } 
                                        }
                                    } 
                                } 
                    echo $res2;       
                  ?>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
              </div>
            </div>
            <div class="u-form-group u-form-select u-form-group-2">
              <label for="select-a9f1" class="u-form-control-hidden u-label"></label>
              <div class="u-form-select-wrapper">
                <select id="select-a9f1" name="Name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-2">
                  <?php
                    $fir=(int)$fir;
                      $query = "SELECT * FROM users WHERE Group_n=(SELECT Group_n FROM groups WHERE ID='$fir')";
                      $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
                      for ($dat = []; $row = mysqli_fetch_assoc($result); $dat[] = $row); $result = ''; 
                      foreach ($dat as $ele) {
                      $res3 .= '<option value="'. $ele['Login'] .'">'. $ele['Login'] .'</option>';                          
                       }       
                      echo $res3;       
                  ?>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
              </div>
            </div>
            <div class="u-form-group u-form-select u-form-group-3">
              <label for="select-98bc" class="u-form-control-hidden u-label"></label>
              <div class="u-form-select-wrapper">
                <select id="select-98bc" name="Mark" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-3">
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="Зачёт">Зачёт</option>
                  <option value="Неявка">Неявка</option>
                  <option value="Неуд">Неуд</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
              </div>
            </div>
            <div class="u-form-date u-form-group u-form-group-4">
              <label for="date-a7d1" class="u-form-control-hidden u-label"></label>
              <input type="date" placeholder="2021-12-01" id="date-a7d1" name="date" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-4" required="">
            </div>
            <div class="u-form-group u-form-submit u-form-group-5">
              <a href="#" class="u-btn u-btn-submit u-button-style">Добавить<br>
              </a>
              <input type="submit" onclick="add(); this.form.submit();" value="submit"name="addNote" class="u-form-control-hidden">
            </div>
            <div class="u-form-send-message u-form-send-success">Ошибка.</div>
            <div class="u-form-send-error u-form-send-message">Добавлено.</div>
            <input type="hidden" value="" name="addcheck" id="hh" >
          </form>
        </div>
         <?php
           }
         ?>
      </div>
    </section>
     <script>
        function onload(){
        var element = document.getElementById("select_fir");
        element.value = '<?php echo $fir?>';
        var element = document.getElementById("hh");
        element.value = 'nothing';
        }
        onload()                
    </script>
    <!--авторизация-->
    <section class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-section-5" id="sec-784b">
      <div class="u-align-left u-container-style u-dialog u-shape-rectangle u-white u-dialog-1">
        <div class="u-container-layout u-valign-top u-container-layout-1">
          <div class="u-expanded-width u-tabs u-tabs-1">
            <ul class="u-border-2 u-border-grey-75 u-tab-list u-unstyled" role="tablist">
              <li class="u-tab-item" role="presentation">
                <a class="active u-active-white u-button-style u-hover-palette-5-base u-tab-link u-text-active-palette-1-dark-1" id="link-tab-6bea" href="#tab-6bea" role="tab" aria-controls="tab-6bea" aria-selected="true">Войти</a>
              </li>
              <li class="u-tab-item" role="presentation">
                <a class="u-active-white u-button-style u-hover-palette-5-base u-tab-link u-text-active-palette-1-dark-1" id="link-tab-58cb" href="#tab-58cb" role="tab" aria-controls="tab-58cb" aria-selected="false">Зарегистрироваться</a>
              </li>
            </ul>
            <div class="u-tab-content">
              <div class="u-container-style u-shape-rectangle u-tab-active u-tab-pane" id="tab-6bea" role="tabpanel" aria-labelledby="link-tab-6bea">
                <div class="u-container-layout u-container-layout-2">
                  <div class="u-form u-login-control u-form-1">
                    <form action="#" method="POST" class="u-clearfix u-form-custom-backend u-form-spacing-0 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;">
                      <div class="u-form-group u-form-name">
                        <label for="username-2025" class="u-label">Имя пользователя *</label>
                        <input type="text" placeholder="Введите имя пользователя" id="username-2025" name="username" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-group u-form-password">
                        <label for="password-2025" class="u-label">Пароль *</label>
                        <input type="text" placeholder="Введите пароль" id="password-2025" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-checkbox u-form-group">
                        <input type="checkbox" id="checkbox-2025" name="remember" value="On">
                        <label for="checkbox-2025" class="u-label">Запомнить</label>
                      </div>
                      <div class="u-align-right u-form-group u-form-submit">
                        <a href="#" class="u-border-none u-btn u-btn-submit u-button-style u-palette-1-dark-1 u-btn-1">Войти<br>
                        </a>
                        <input type="submit" value="submit" name="log" class="u-form-control-hidden">
                      </div>
                      <input type="hidden" value="" name="recaptchaResponse">
                    </form>
                  </div>
                </div>
              </div>
              <div class="u-align-left u-container-style u-shape-rectangle u-tab-pane" id="tab-58cb" role="tabpanel" aria-labelledby="link-tab-58cb">
                <div class="u-container-layout u-container-layout-3">
                  <div class="u-form u-login-control u-form-2">
                    <form action="#" method="POST" class="u-clearfix u-form-custom-backend u-form-spacing-0 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;">
                      <div class="u-form-group u-form-name">
                        <label for="username-2025" class="u-label">Имя пользователя *</label>
                        <input type="text" placeholder="Введите имя пользователя" id="username-2025" name="username" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-group u-form-password">
                        <label for="password-2025" class="u-label">Пароль *</label>
                        <input type="text" placeholder="Введите пароль" id="password-2025" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-group u-form-password">
                          <label for="password-2026" class="u-label">Повторите пароль *</label>
                          <input type="text" placeholder="Введите пароль" id="password-2026" name="password1" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                       <div class="u-form-group u-form-name">
                        <label for="username-20" class="u-label">Учебная группа</label>
                      </div>
                      <div class="u-form-group u-form-select u-form-group-1">
                      <label for="select-0352" class="u-form-control-hidden u-label"></label>
                      <div class="u-form-select-wrapper">
                        <select id="select-0352" name="select" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-1">
                          <?php
                            $query = "SELECT * FROM groups WHERE ID>0";
                            $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
                            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; 
                            $num=1;
                            foreach ($data as $elem) { 
                                $result .= '<option value="'. $elem['Group_n'] .'">'. $elem['Group_n'] .'</option>'; 
                                $num+=1;
                            } 
                            echo $result;       
                          ?>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>


                      <div class="u-align-right u-form-group u-form-submit">
                        <a href="#" class="u-border-none u-btn u-btn-submit u-button-style u-palette-1-dark-1 u-btn-2">Зарегистрироваться<br>
                        </a>
                        <input type="submit" value="submit" name="Reg" class="u-form-control-hidden">
                      </div>
                      <input type="hidden" value="" name="recaptchaResponse">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-4f81"></use></svg><svg class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-4f81"><rect x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2" height="16"></rect><rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16" height="2"></rect></svg></button>
      </div>
    </section><style> .u-section-5 {
  min-height: 938px;
}


  </body>
</html>