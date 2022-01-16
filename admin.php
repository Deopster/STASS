<!DOCTYPE html>
<?php
require_once("connect.php");
session_start();
$pieces = explode(" ", $_SESSION["login"]);
$name=$pieces[0];
if (empty($pieces[1])){
$pieces[1]='Отсутствует';
}
$FIO=$pieces[1];
$USER_ID =$_SESSION["ID"];
if ($_SESSION["level"] !=2 or empty($_SESSION["level"]))
{
   echo "<script>window.location.href='./index.php'</script>";
}

if (isset($_REQUEST['Teacher']))
{
            $subj = $_REQUEST['subject'];
            $Teacher = $_REQUEST['Teacher'];
            $query = "SELECT * FROM `by_subjects` WHERE `Teacher` ='$Teacher' AND Subject='$subj' ";
            $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; 
            if(empty($data)) {
                mysqli_query($link, "INSERT INTO `by_subjects` SET `Teacher` ='$Teacher' , Subject='$subj'") or die(mysqli_error($link));  
                echo "<script>window.location.href='./admin.php'</script>";
            }

}
if (isset($_REQUEST['Purpose']))
{
            $p = $_REQUEST['Purpose'];
            $T = $_REQUEST['group'];
            $query = "SELECT * FROM `grops_teachers` WHERE `purpose` ='$p' AND `Group_n` ='$T' ";
            $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; 
            if(empty($data)) {
                mysqli_query($link, "INSERT INTO `grops_teachers` SET `purpose` ='$p' , `Group_n` ='$T'") or die(mysqli_error($link));  
                echo "<script>window.location.href='./admin.php'</script>";
            }

}
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">
 var i;
 var j;
 var tb;


//тут остальное
//val содержит то,что хранится в ячейке
$(function () {
	$('td').click(function (e) {
		var t = e.target || e.srcElement;
		let cell = e.target;
	    if (cell.tagName.toLowerCase() != 'td')
		return;
	    i = cell.parentNode.rowIndex;
	    j = cell.cellIndex-1;
	    console.log(i, j);
		var elm_name = t.tagName.toLowerCase();
        console.log(elm_name1);
		var elm_name_class = t.id;
        tb=elm_name_class;
		if ((elm_name == 'input') || (elm_name_class == 'trig')) { return false; }
        console.log(elm_name_class);
		var val = $(this).html()	
		var code = '<input type="char" onfocus="this.setSelectionRange(this.value.length,this.value.length);" textAlign="right" class="editthis" id="edit" value="' + val + '" />';
		
		$(this).empty().append(code);
		$('#edit').focus();
		$('#edit').blur(function () {
		var val = $(this).val();
		$(this).parent().empty().html(val);
		send(val,elm_name_class);
		});
	});
});
</script>
<script>
function send(val,p){
    var rno =p;
	//alert(rno+ " "+ val);
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {fn:val, fr:rno}
    }).done(function( result )
        {
            $("#msg").html( " Address of Roll no " +rno +" is "+result );
        });
}
</script>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Имя, Фамилия">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>lk</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="lk.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="личный кабинет">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/Untitled-11.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="lk">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body"><header class="u-clearfix u-header u-header" id="sec-5d90"><div class="u-clearfix u-sheet u-sheet-1">
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
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 10px 20px;">Главная</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php" style="padding: 10px 20px;">Главная</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-align-center u-clearfix u-gradient u-section-2">
     <div class="u-clearfix u-sheet u-sheet-1">

    <h1>Назначить предмет преподавателю </h1>
    <div class="u-form u-form-1">
          <form action="" method="GET" class="u-clearfix u-form-horizontal u-form-spacing-15 u-inner-form" style="padding: 15px" source="custom">
            <div class="u-form-group u-form-select u-form-group-1">
                      <label for="select-0352" class="u-form-control-hidden u-label"></label>
                      <div class="u-form-select-wrapper">
                        <select  id="select_fir" name="Teacher" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-1">
                          <?php
                            $res="";
                            $quer = "SELECT * FROM `Users` WHERE `allowment` = 1";
                            $result = mysqli_query($GLOBALS['link'], $quer) or die(mysqli_error($link));
                            for ($da = []; $row = mysqli_fetch_assoc($result); $da[] = $row); $result = ''; 
                            foreach ($da as $el) { 
                                    $res .= '<option value="'. $el['User ID'] .'">'. $el['Login'] .'</option>'; 
                                } 
                            echo $res;       
                          ?>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>
            <div class="u-form-group u-form-select u-form-group-2">
              <label for="select-0352" class="u-form-control-hidden u-label"></label>
              <div class="u-form-select-wrapper">
                <select id="subject" name="subject" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-1">
                 
                          <?php
                            $res="";
                            $quer = "SELECT * FROM `subject_list`";
                            $result = mysqli_query($GLOBALS['link'], $quer) or die(mysqli_error($link));
                            for ($da = []; $row = mysqli_fetch_assoc($result); $da[] = $row); $result = ''; 
                            foreach ($da as $el) { 
                                    $res .= '<option value="'. $el['Subject ID'] .'">'. $el['subject'] .'</option>'; 
                                } 
                            echo $res;       
                          ?>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
              </div>
            </div>
            <div class="u-form-group u-form-submit u-form-group-5">
              <a href="#" class="u-btn u-btn-submit u-button-style">Назначить<br>
              </a>
              <input type="submit" onclick="this.form.submit();" value="submit"name="addNote" class="u-form-control-hidden">
            </div>
            <div class="u-form-send-message u-form-send-success">Ошибка.</div>
            <div class="u-form-send-error u-form-send-message">Добавлено.</div>
          </form>
        </div>
            <div class="u-expanded-width u-table u-table-responsive u-table-1">
           <table class="u-table-entity u-table-entity-1">
              <?php
                $result='';
                $que = "SELECT * FROM `by_subjects` WHERE `link ID` >0";
                $resu = mysqli_query($GLOBALS['link'], $que) or die(mysqli_error($link));
                for ($da = []; $r = mysqli_fetch_assoc($resu); $da[] = $r); $resu = ''; foreach ($da as $el) { 
                    $n=$el['Subject'];
                    $a=$el['Teacher'];
                    $result .= '<tr>'; 
                    $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell" id=" trig">' . $el['link ID'] . '</td>';
                    $quer = "SELECT `Login` FROM `Users` WHERE `User ID` = '$a'";
                    $resul = mysqli_query($GLOBALS['link'], $quer) or die(mysqli_error($link));
                        for ($dat = []; $ro = mysqli_fetch_assoc($resul); $dat[] = $ro); $resul = ''; foreach ($dat as $ele) { 
                            $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell Allowment" name=users ">' . $ele['Login'] . '</td>';
                        }
                    $qu = "SELECT  `subject` FROM `subject_list` WHERE `Subject ID` = '$n'";
                    $res = mysqli_query($GLOBALS['link'], $qu) or die(mysqli_error($link));
                        for ($d = []; $k = mysqli_fetch_assoc($res); $d[] = $k); $res = ''; foreach ($d as $e) { 
                            $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell Allowment" name=users ">' . $e['subject'] . '</td>'; 
                        }
                }
              
              echo $result;
              ?>
             </table>
          </div>
          <h1>Назначить группу </h1>
          <div class="u-form u-form-1">
          <form action="" method="GET" class="u-clearfix u-form-horizontal u-form-spacing-15 u-inner-form" style="padding: 15px" source="custom">
            <div class="u-form-group u-form-select u-form-group-1">
                      <label for="select-0352" class="u-form-control-hidden u-label"></label>
                      <div class="u-form-select-wrapper">
                        <select  id="select_fir" name="Purpose" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-1">
                          <?php
                            $result='';
                            $que = "SELECT * FROM `by_subjects` WHERE `link ID` >0";
                            $resu = mysqli_query($GLOBALS['link'], $que) or die(mysqli_error($link));
                            for ($da = []; $r = mysqli_fetch_assoc($resu); $da[] = $r); $resu = ''; foreach ($da as $el) { 
                                $n=$el['Subject'];
                                $a=$el['Teacher'];
                                $quer = "SELECT `Login` FROM `Users` WHERE `User ID` = '$a'";
                                $resul = mysqli_query($GLOBALS['link'], $quer) or die(mysqli_error($link));
                                    for ($dat = []; $ro = mysqli_fetch_assoc($resul); $dat[] = $ro); $resul = ''; foreach ($dat as $ele) { 
                                        $nam = $ele['Login'];
                                    }
                                $qu = "SELECT  `subject` FROM `subject_list` WHERE `Subject ID` = '$n'";
                                $res = mysqli_query($GLOBALS['link'], $qu) or die(mysqli_error($link));
                                    for ($d = []; $k = mysqli_fetch_assoc($res); $d[] = $k); $res = ''; foreach ($d as $e) {
                                        $sb = $e['subject'];
                                    }
                                $result .='<option value="'. $el['link ID'] .'">'. $sb.' - '.$nam .'</option>';

                            }
              
                          echo $result;
                          ?>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                      </div>
                    </div>
            <div class="u-form-group u-form-select u-form-group-2">
              <label for="select-0352" class="u-form-control-hidden u-label"></label>
              <div class="u-form-select-wrapper">
                <select id="subject" name="group" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white u-input-1">
                 
                          <?php
                            $res="";
                            $quer = "SELECT * FROM `groups`";
                            $result = mysqli_query($GLOBALS['link'], $quer) or die(mysqli_error($link));
                            for ($da = []; $row = mysqli_fetch_assoc($result); $da[] = $row); $result = ''; 
                            foreach ($da as $el) { 
                                    $res .= '<option value="'. $el['Groups ID'] .'">'. $el['Group_n'] .'</option>'; 
                                } 
                            echo $res;       
                          ?>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
              </div>
            </div>
            <div class="u-form-group u-form-submit u-form-group-5">
              <a href="#" class="u-btn u-btn-submit u-button-style">Назначить<br>
              </a>
              <input type="submit" onclick="this.form.submit();" value="submit"name="addNote" class="u-form-control-hidden">
            </div>
            <div class="u-form-send-message u-form-send-success">Ошибка.</div>
            <div class="u-form-send-error u-form-send-message">Добавлено.</div>
          </form>
        </div>
         <div class="u-expanded-width u-table u-table-responsive u-table-1">
           <table class="u-table-entity u-table-entity-1">
              <?php
                $result='';
                $que = "SELECT * FROM `grops_teachers` WHERE `Teacher_groups ID` >0";
                $resu = mysqli_query($GLOBALS['link'], $que) or die(mysqli_error($link));
                for ($da = []; $r = mysqli_fetch_assoc($resu); $da[] = $r); $resu = ''; foreach ($da as $el) { 
                    $s=$el['purpose'];
                    $a=$el['Group_n'];
                    $result .= '<tr>'; 
                    $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell" id=" trig">' . $el['Teacher_groups ID'] . '</td>';

                    $que = "SELECT * FROM `by_subjects` WHERE `link ID` ='$s'";
                            $resu = mysqli_query($GLOBALS['link'], $que) or die(mysqli_error($link));
                            for ($da = []; $r = mysqli_fetch_assoc($resu); $da[] = $r); $resu = ''; foreach ($da as $el) { 
                                $n=$el['Subject'];
                                $g=$el['Teacher'];
                                $quer = "SELECT `Login` FROM `Users` WHERE `User ID` = '$g'";
                                $resul = mysqli_query($GLOBALS['link'], $quer) or die(mysqli_error($link));
                                    for ($dat = []; $ro = mysqli_fetch_assoc($resul); $dat[] = $ro); $resul = ''; foreach ($dat as $ele) { 
                                        $nam = $ele['Login'];
                                    }
                                $qu = "SELECT  `subject` FROM `subject_list` WHERE `Subject ID` = '$n'";
                                $res = mysqli_query($GLOBALS['link'], $qu) or die(mysqli_error($link));
                                    for ($d = []; $k = mysqli_fetch_assoc($res); $d[] = $k); $res = ''; foreach ($d as $e) {
                                        $sb = $e['subject'];
                                    }
                                $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell Allowment" name=users ">' . $sb.' - '.$nam . '</td>';

                            }

                    $quer = "SELECT * FROM `groups` WHERE `Groups ID` = '$a'";
                            $re = mysqli_query($GLOBALS['link'], $quer) or die(mysqli_error($link));
                            for ($da = []; $row = mysqli_fetch_assoc($re); $da[] = $row); $re = ''; 
                            foreach ($da as $el) { 
                                    $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell Allowment" name=users ">' . $el['Group_n'] . '</td>';
                                } 
                }
              
              echo $result;
              ?>
             </table>
          </div>


     
         
      </div>
    </section>
  </body>
</html>