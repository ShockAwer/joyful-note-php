<?php
#��������������������������������������������������������������������
#��  JOYFUL NOTE v1.21 (2002/01/15)
#��  Copyright(C) Kent Web 2002
#��  webmaster@kent-web.com
#��  http://www.kent-web.com/
#��������������������������������������������������������������������
$ver = 'Joyful Note v1.21';
#��������������������������������������������������������������������
#�� [���ӎ���]
#�� 1. ���̃X�N���v�g�̓t���[�\�t�g�ł��B���̃X�N���v�g���g�p����
#��    �����Ȃ鑹�Q�ɑ΂��č�҂͈�؂̐ӔC�𕉂��܂���B
#�� 2. �ݒu�Ɋւ��鎿��̓T�|�[�g�f���ɂ��肢�������܂��B
#��    ���ڃ��[���ɂ�鎿��͈�؂��󂯂������Ă���܂���B
#�� 3. �Y�t�� home.gif �� L.O.V.E �� mayuRin ����ɂ��摜�ł��B
#��������������������������������������������������������������������
#
# �y�t�@�C���\����z
#
#  public_html (�z�[���f�B���N�g��)
#      |
#      +-- joyful / joyful.php [644]
#            |      joyful.log [666]
#            |      count.dat  [666]
#            |      pastno.dat [666]
#            |      rejpeg     [755]
#            |      repng      [755]
#            |      regif      [755]
#            |
#            +-- img [777] / home.gif, soon.gif, ...
#            |
#            +-- imgs [777] /
#            |
#            +-- past [777] / 1.dat [666]
#            |
#            +-- gif [755] / 0.gif, 1.gif, ...GIF�J�E���^�[���g���ꍇ
/////////////////////////////////////////////////////
// KENT�����"JoyfulNote"��php�ɈڐA�������̂ł��B //
//    http://script.s16.xrea.com/    nobody����    //
//                                 2002/09/24      //
/////////////////////////////////////////////////////
#============#
#  �ݒ荀��  #
#============#

extract ($HTTP_COOKIE_VARS);
extract ($HTTP_SERVER_VARS);
extract ($HTTP_POST_VARS);
extract ($HTTP_GET_VARS);

# �^�C�g�������w��
$title = "Joyful Note";

# �^�C�g���̐F
$t_color = "#804040";

# �^�C�g���̑傫���i�|�C���g��:�X�^�C���V�[�g�ŗL���j
$t_size = '24pt';

# �^�C�g���^�{���̕����t�H���g
$face = '"�l�r �o�S�V�b�N", osaka, sans-serif';

# �{���̕����傫���i�|�C���g��:�X�^�C���V�[�g�ŗL���j
$b_size = '10pt';

# �ǎ����w�肷��ꍇ�ihttp://����w��j
$bg = "";

# �w�i�F���w��
$bc = "#FEF5DA";

# �����F���w��
$tx = "#000000";

# �����N�F���w��
$lk = "#0000FF";	# ���K��
$vl = "#800080";	# �K���
$al = "#FF0000";	# �K�⒆
$hl = "#00FF00";	# �}�E�Xon

# �߂���URL (index.html�Ȃ�)
$homepage = "../";

# �ő�L���� (�e�L�������X�L�����܂߂����j
$max = 50;

# �Ǘ��җp�}�X�^�p�X���[�h (�p�����łW�����ȓ�)
$master = '0123';

# �ԐM�����Ɛe�L�����g�b�v�ֈړ� (0=no 1=yes)
$topsort = 1;

# �ԐM�ɂ��Y�t�@�\�������� (0=no 1=yes)
$res_clip = 1;

# �^�C�g����GIF�摜���g�p���鎞 (http://����L�q)
$title_gif = "";
$tg_w = 180;	# GIF�摜�̕� (�s�N�Z��)
$tg_h = 40;	#    �V    ���� (�s�N�Z��)

# �~�j�J�E���^�̐ݒu
# �� 0=no 1=�e�L�X�g 2=GIF�摜
$counter = 1;

# �~�j�J�E���^�̌���
$mini_fig = 6;

# �e�L�X�g�̂Ƃ��F�~�j�J�E���^�̐F
$cnt_color = "#BB0000";

# GIF�J�E���^�̂Ƃ��F�摜�܂ł̃f�B���N�g��
# �� �Ō�͕K�� / �ŕ���
$gif_path = "./gif/";
$mini_w = 20;		# �摜�̉��T�C�Y
$mini_h = 20;		# �摜�̏c�T�C�Y

# �J�E���^�t�@�C��
$cntfile = './count.dat';

# �^�O�̋��� (0=no 1=yes)
$tagkey = 0;

# �X�N���v�g�̃t�@�C����
# �� �t���p�X�Ŏw�肷��ꍇ�� http:// ����L�q
$script  = $PHP_SELF;

# ���O�t�@�C�����w��
# �� �t���p�X�Ŏw�肷��ꍇ�� / ����L�q
$logfile = './joyful.log';

# �A�b�v���[�h�f�B���N�g��
# �� �p�X�̍Ō�� / �ŏI��邱��
# �� �t���p�X���� / ����L�q����
$ImgDir = "./img/";
$ImgDir2 = "./imgs/";

# �Y�t�t�@�C���̃A�b�v���[�h�Ɏ��s�����Ƃ�
#   0 : �Y�t�t�@�C���͖������A�L���͎󗝂���
#   1 : �G���[�\�����ď����𒆒f����
$clip_error = 1;

# �L�� [�^�C�g��] ���̒��� (�S�p�������Z)
$sub_len = '15';

# ���[���A�h���X�̓��͕K�{ (0=no 1=yes)
$in_email = 0;

# �L���� [�^�C�g��] ���̐F
$sub_color = "#880000";

# �L���\�����̉��n�̐F
$tbl_color = "#FFFFFF";

# ����IP�A�h���X����̘A�����e���ԁi�b���j
# �� �A�����e�Ȃǂ̍r�炵�΍�
# �� �l�� 0 �ɂ���Ƃ��̋@�\�͖����ɂȂ�܂�
$wait = 0;

# �P�y�[�W������̋L���\���� (�e�L��)
$p_log = 5;

# ���e������ƃ��[���ʒm����
#  0 : �ʒm���Ȃ�
#  1 : �ʒm���邪�A�����̓��e�L���̓��[�����Ȃ��B
#  2 : �ʒm����B�����̓��e�L�����ʒm����B
$mailing = 0;

# ���[���A�h���X(���[���ʒm���鎞)
$mailto = 'xxx@xxx.xxx';

# ���T�C�g���瓊�e�r�����Ɏw�� (http://���珑��)
$base_url = "";

# �����F�̐ݒ�B
$COLORS = array ('#800000','#DF0000','#008040','#0000FF','#C100C1','#FF80C0','#FF8040','#000080');

# URL�̎��������N (0=no 1=yes)
# �� �^�O���̏ꍇ�� no �Ƃ��邱�ƁB
$autolink = 1;

# �^�O�L���}���I�v�V���� (FreeWeb�Ȃǁj
#   �� <!-- �㕔 --> <!-- ���� --> �̑���Ɂu�L���^�O�v��}������B
#   �� �L���^�O�ȊO�ɁAMIDI�^�O �� LimeCounter���̃^�O�ɂ��g�p�\�ł��B
$banner1 = '<!-- �㕔 -->';	# �f���㕔�ɑ}��
$banner2 = '<!-- ���� -->';	# �f�������ɑ}��

# �A�N�Z�X�����i�z�X�g���AIP�A�h���X���L�q�j
$deny = array (
	"*.anonymizer.com",
	"cache*.*.interlog.com",
	"211.154.120.*",
	"",
	"",
	"",
	"",
	"",
	""
);

# �A�b�v���[�h��������t�@�C���`��
#  0:no  1:yes
$gif   = 1;	# GIF�t�@�C��
$jpeg  = 1;	# JPEG�t�@�C��
$png   = 1;	# PNG�t�@�C��
$text  = 1;	# TEXT�t�@�C��
$lha   = 1;	# LHA�t�@�C��
$zip   = 1;	# ZIP�t�@�C��
$pdf   = 1;	# PDF�t�@�C��
$midi  = 1;	# MIDI�t�@�C��
$msword= 0;	# WORD�t�@�C��
$excel = 0;	# EXCEL�t�@�C��
$ppt   = 0;	# POWERPOINT�t�@�C��
$ram   = 0;	# RAM�t�@�C��
$rm    = 0;	# RM�t�@�C��
$mpeg  = 0;	# MPEG�t�@�C��
$mp3   = 0;	# MP3�t�@�C��

# ���e�󗝍ő�T�C�Y (bytes)
# �� �� : 102400 = 100KB
$maxdata = 300*1024;

# �摜�t�@�C���̍ő�\���̑傫���i�P�ʁF�s�N�Z���j
# �� ����𒴂���摜�͏k���\�����܂�
$MaxW = 120;	# ����
$MaxH = 120;	# �c��

$home_icon = 1;# �ƃA�C�R���̎g�p (0=no 1=yes)

# �A�C�R���摜�t�@�C���� (�t�@�C�����̂�)
$IconHome = "home.gif";  # �z�[��
$IconClip = "clip.gif";  # �N���b�v
$IconSoon = "soon.gif";  # COMINIG SOON

# �摜�Ǘ��҃`�F�b�N�@�\ (0=no 1=yes)
# �� �A�b�v���[�h�u�摜�v�͊Ǘ��҂��`�F�b�N���Ȃ��ƕ\������Ȃ��@�\�ł�
# �� �`�F�b�N�����܂Łu�摜�v�́uCOMMING SOON�v�̃A�C�R�����\������܂�
$ImageCheck = 0;

#---(�ȉ��́u�ߋ����O�v�@�\���g�p����ꍇ�̐ݒ�ł�)---#
#
# �ߋ����O���� (0=no 1=yes)
$pastkey = 1;

# �ߋ����O�pNO�t�@�C��
$nofile  = './pastno.dat';

# �ߋ����O�̃f�B���N�g��
# �� �t���p�X�Ȃ� / ����L�q�ihttp://����ł͂Ȃ��j
# �� �Ō�͕K�� / �ŕ���
$pastdir = './past/';

# �ߋ����O�P�t�@�C���̍s��
# �� ���̍s���𒴂���Ǝ��y�[�W�������������܂�
$log_line = '600';
if (ereg ("MSIE 3",$HTTP_USER_AGENT)) { 
	$nam_wid = 30;
	$sub_wid = 40;
	$com_wid = 65;
	$url_wid = 48;
	$nam_wid2 = 20;
} elseif (ereg ("MSIE 4",$HTTP_USER_AGENT) || ereg ("MSIE 5",$HTTP_USER_AGENT)) { 
	$nam_wid = 30;
	$sub_wid = 40;
	$com_wid = 60;
	$url_wid = 70;
	$nam_wid2 = 20;
} else {
	$nam_wid = 20;
	$sub_wid = 25;
	$com_wid = 56;
	$url_wid = 50;
	$nam_wid2 = 10;
}

#============#
#  �ݒ芮��  #
#============#

# ���C������
$host = $REMOTE_HOST;
if (!$host) {
	$host = gethostbyaddr ($REMOTE_ADDR);
}
$flag=0;
while(list(,$value) = each ($deny)) {
	if (!$value) { continue; }
	$value = str_replace("*",".*",$value);
if (ereg($value,$host)) { $flag=1; break; }
}
if ($flag) { error("�A�N�Z�X��������Ă��܂���");
}
list($c_name,$c_email,$c_url,$c_pwd,$c_color)=explode(",",$JOYFUL);
$c_name = stripslashes($c_name);

#------------------#
#  HTML�̃w�b�_�[  #
#------------------#
function htheader() {
global $HTTP_HOST,$cook,$title,$b_size,$face,$hl,$t_size,$bg,$bc,$tx,$lk,$vl,$al;
echo <<<EOD
<HTML>
<HEAD>
<META http-equiv="Content-type" content="text/html; charset=Shift_JIS">
<META http-equiv="Content-Style-Type" content="text/css">
<TITLE>$title</TITLE>
<STYLE type="text/css">
<!--
BODY,TR,TD,TH { font-size: $b_size; font-family: $face }
A:hover { color: $hl }
SPAN    { font-size: $t_size }
BIG     { font-size: 12pt }
SMALL   { font-size: 9pt }
BODY   { margin-left: 4em; margin-right: 4em}
-->
</STYLE>
</HEAD>
<BODY background="$bg" bgcolor="$bc" text="$tx" link="$lk" vlink="$vl" alink="$al">
EOD;
}

#-----------------#
#  ����URL�����N  #
#-----------------#
function auto_link($file) {
	$file = preg_replace("/([^=^\"]|^)(http\:[\w\.\~\-\/\?\&\+\=\:\@\%\;\#\%]+)/","\\1<a href=\"\\2\" target='_top'>\\2</a>",$file);
	return $file;
}

#--------------#
#  �G���[����  #
#--------------#
function error($mes1){
	htheader();
	echo "<CENTER><HR width=400><H3>ERROR !</H3>
<FONT color=red><B>$mes1</B></FONT>
<P><HR width=400></CENTER>
</BODY></HTML>";
	exit();
}

#----------------#
#  ���O��������  #
#----------------#
if($mode=="regist"){
	$ref_url = urldecode ($HTTP_REFERER);
	if ($baseurl) {
		if (ereg($base_url,$ref_url)) { error("�s���ȃA�N�Z�X�ł�"); }
	}
	if ($name == "") { error("���O�����͂���Ă��܂���"); }
	if ($comment == "") { error("�R�����g�����͂���Ă��܂���"); }
	if ($in_email) {
		if ($email == "") { error("�d���[�������͂���Ă��܂���"); }
		elseif (!eregi("(.*)\@(.*)\.(.*)",$email)) {
			error("�d���[���̓��͓��e���s���ł�");
		}
	}
	$name = stripslashes($name);
	$sub = stripslashes($sub);
	$comment = stripslashes($comment);
	$name = htmlspecialchars ($name);
	$email = htmlspecialchars ($email);
	$url = htmlspecialchars ($url);
	$sub = htmlspecialchars ($sub);
	$url = str_replace ("http://","", $url);
	$cookval = implode(",", array($name,$email,$url,$pwd,$color));
	setcookie ("JOYFUL", $cookval,time()+60*24*3600);
	list($c_name,$c_email,$c_url,$c_pwd,$c_color)=explode(",",$cookval);
	if ($tagkey) {
		$comment = str_replace("<>","&lt;&gt;",$comment);
	}
	else {$comment = htmlspecialchars ($comment);}
	list($name,$email,$url,$sub) = str_replace (array("\r","\n"),"",array($name,$email,$url,$sub));
	$comment = str_replace (array("\r\n","\r","\n"),"<BR>",$comment);
	$times = time();
	$date = date("Y/m/d(D) H:i",$times);
	$lines = file ($logfile);
	$top = array_shift($lines);
	list($no,$ip,$time2) = explode("<>", $top);
	$no++;
	if ($REMOTE_ADDR == $ip && $wait > $times - $time2) {
		error("�A�����e�͂������΂炭���Ԃ������ĉ�����");
	}
	#  �摜(�t�@�C��)�A�b�v���[�h  #
	////////////////////////////////////////////////////////
	if (file_exists($HTTP_POST_FILES['upfile']['tmp_name'])) {

		$pos = strrpos($HTTP_POST_FILES['upfile']['name'],".");
		$tail = substr($HTTP_POST_FILES['upfile']['name'],$pos,strlen($HTTP_POST_FILES['upfile']['name'])-$pos+1);
		$tail = strtolower ($tail);
		if ($tail == ".jpeg") {$tail = ".jpg";}
		if ($tail == ".mpeg") {$tail = ".mpg";}
		if ($tail == ".midi") {$tail = ".mid";}
		
		$flag=0;
		if ($tail == ".gif" && $gif ) { $flag=1; }
		if ($tail == ".jpg" && $jpeg) { $flag=1; }
		if ($tail == ".png" && $png ) { $flag=1; }
		if ($tail == ".lzh" && $lha ) { $flag=1; }
		if ($tail == ".txt" && $text) { $flag=1; }
		if ($tail == ".zip" && $zip ) { $flag=1; }
		if ($tail == ".pdf" && $pdf ) { $flag=1; }
		if ($tail == ".mid" && $midi) { $flag=1; }
		if ($tail == ".doc" && $word) { $flag=1; }
		if ($tail == ".xls" && $excel) { $flag=1; }
		if ($tail == ".ppt" && $ppt ) { $flag=1; }
		if ($tail == ".ram" && $ram ) { $flag=1; }
		if ($tail == ".rm"  && $rm  ) { $flag=1; }
		if ($tail == ".mpg" && $mpeg) { $flag=1; }
		if ($tail == ".mp3" && $mp3 ) { $flag=1; }

		if ($flag) {
			copy($HTTP_POST_FILES['upfile']['tmp_name'], "$ImgDir$no$tail");
			if ($tail == ".jpg" || $tail == ".gif" || $tail == ".png"){
				($size = GetImageSize ($HTTP_POST_FILES['upfile']['tmp_name'])) || error("�摜�t�@�C�����ςł�");
				$W = $size[0];
				$H = $size[1];
				# �摜�\���k��
				if ($W > $MaxW || $H > $MaxH) {
					$W2 = $MaxW / $W;
					$H2 = $MaxH / $H;
					($W2 < $H2) ? $key = $W2 :  $key = $H2;
					if ($tail == ".jpg") {
						system("./rejpeg $ImgDir$no$tail $ImgDir2$no$tail $key");
					}
					if ($tail == ".png") {
						system("./repng $ImgDir$no$tail $ImgDir2$no$tail $key");
					}
					if ($tail == ".gif") {
						system("./regif $ImgDir$no$tail $ImgDir2$no$tail $key");
					}
				}
			}
		}elseif($clip_error){ error("�A�b�v���[�h�ł��Ȃ��t�@�C���`���ł�"); }
	}
	////////////////////////////////////////////////////////
	if ($pwd != "") { $ango = crypt($pwd); }
	if ($reno == "") {
		$i=0;
		$stop=0;
		while (list (, $line) = each ($lines)) {
			list($no2,$reno2,$d,$n,$m,$s,$com,
				$u,$ho,$p,$c,$tail2,$w,$h,$chk) = explode("<>",$line);
			$i++;
			if ($i > $max-1 && $reno2 == "") { $stop=1; }
			if (!$stop) { $new .= $line; }
			else {
				if ($pastkey) { $data[] = $line; }
				if (file_exists ("$ImgDir$no2$tail2")) { unlink("$ImgDir$no2$tail2"); }
				if (file_exists ("$ImgDir2$no2$tail2")) { unlink("$ImgDir2$no2$tail2"); }
			}
		}
		$new = "$no<><>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$tail<>$W<>$H<>0<>\n".$new;
		$new = "$no<>$REMOTE_ADDR<>$times<>\n".$new;

		# �ߋ����O�X�V
		if ($data) {
			$past_flag=0;
			# �ߋ�NO���J��
			$no = file($nofile);
			$count = $no[0];

			# �ߋ����O�̃t�@�C�������`
			$pastfile  = "$pastdir$count.dat";
			# �ߋ����O���J��
			$past = file ($pastfile);
			# �K��̍s�����I�[�o�[����Ǝ��t�@�C������������
			if (count($past) > $log_line) {
				$past_flag=1;

				# �J�E���g�t�@�C���X�V
				$count++;
				$out = fopen($nofile,"w");
				fputs ($out, $count);
				fclose($out);
				$pastfile = "$pastdir$count.dat";
				$past = array();
			}

			while (list(,$line) = each($data)) {
				list($pno,$preno,$pdate,$pname,$pmail,$psub,$pcom,$purl,$pho) = explode("<>",$line);
				if ($pmail) { $pname = "<A href=\"mailto:$pmail\">$pname</A>"; }
				if ($purl) { $purl = "&lt;<A href=\"http://$purl\" target='_top'>HOME</A>&gt;"; }
				if ($preno) { $pno = "Res: $preno"; }

				# �ۑ��L�����t�H�[�}�b�g
				$temp .= "<HR>[<B>$pno</B>] <FONT color=\"$sub_color\"><B>$psub</B></FONT> ���e�ҁF<B>$pname</B> <SMALL>���e���F$pdate</SMALL> $purl<BR><BLOCKQUOTE>$pcom</BLOCKQUOTE><!-- $pho -->\n";
			}

			# �ߋ����O���X�V
			$out = fopen ($pastfile,"w+");
			fputs ($out,$temp);
			while (list(,$temp)=each($past)){
				fputs($out,$temp);
			}
			fclose($out);
		}
	}
	# ���X�L���̏ꍇ�F�g�b�v�\�[�g����
	elseif ($reno && $topsort) {
		$match=0;
		$new="";
		$tmp="";
		while (list (, $line) = each ($lines)) {
			list($no2,$reno2) = explode("<>",$line);
			if ($reno == $no2) {
				$match=1;
				$new .= $line;
			}
			elseif ($reno == $reno2) {
				$new .= $line;
			}
			elseif ($match == 1 && $reno == $reno2) {
				$match=2;
				$new .= "$no<>$reno<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$tail<>$W<>$H<>0<>\n";
				$tmp .= $line;
			}
			else { $tmp .= $line; }
		}

		if ($match == 1) {
			$new .= "$no<>$reno<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$tail<>$W<>$H<>0<>\n";
		}
		$new .= $tmp;

		# �X�V
		$new = "$no<>$REMOTE_ADDR<>$times<>\n".$new;
	}
	# ���X�L���̏ꍇ�F�g�b�v�\�[�g�Ȃ�
	else {
		$match=0;
		$new="";
		while (list (, $line) = each ($lines)) {
			list($no2,$reno2) = explode("<>",$line);
			if ($match == 0 && $reno == $no2) { $match=1; }
			elseif ($match == 1 && $reno != $reno2) {
				$match=2;
				$new .= "$no<>$reno<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$tail<>$W<>$H<>0<>\n";
			}
			$new .= $line;
		}
		if ($match == 1) {
			$new .= "$no<>$reno<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$ango<>$color<>$tail<>$W<>$H<>0<>\n";
		}
		# �X�V
		$new = "$no<>$REMOTE_ADDR<>$times<>\n".$new;
	}

	# ���[������
	if (($mailing == 2)||($mailing == 1 && $email != $mailto)) {
		# ���[���^�C�g�����`
		$MailSub = "[$title : $no] $sub";

		# �L���̉��s�E�^�O�𕜌�
		$com = eregi_replace("<br>","\n",$comment);
		$com = str_replace("&lt;","<",$com);
		$com = str_replace("&gt;",">",$com);
		$com = str_replace("&quot;","\"",$com);

		# ���[���{�����`
		$MailBody = <<<EOM
���e�����F$date
�z�X�g���F$host
�u���E�U�F$HTTP_USER_AGENT

���e�Җ��F$name
�d���[���F$email
�t�q�k  �F$url
�^�C�g���F$sub
���e�L���F

$com
EOM;

		# ���[���A�h���X���Ȃ��ꍇ�̓_�~�[���[���ɒu������
		if ($email == "") { $email = 'nomail@xxx.xxx'; }
		mb_language ("ja");
		mb_send_mail($mailto,$MailSub,$MailBody,"From: $email");
	}

	# �X�V
	$fp = fopen ($logfile,"w+");
	fputs($fp,$new);
	fclose($fp);
}

#----------------#
#  �ԐM�t�H�[��  #
#----------------#
if ($mode == "res") {
	
	# ���O��ǂݍ���
	$in = file($logfile);
	$top = array_shift($in);

	# �w�b�_���o��
	htheader();

	# �֘A�L���o��
	print "[<A href=\"javascript:history.back()\">�߂�</A>]\n<P>";
	print "- �ȉ��́A�L��NO. <B>$no</B> �Ɋւ��� <A href='#RES'>�ԐM�t�H�[��</A> �ł� -<HR>\n";
	$flag=0;
	while (list (, $line) = each ($in))  {
		list($no2,$reno,$date,$name,$mail,$sub,$com,$url) = explode("<>",$line);
		if (!$reno) { $com = "<BLOCKQUOTE>$com</BLOCKQUOTE>"; }
		if ($no == $no2 || $no == "$reno") {
			if ($no == $no2) { $resub = $sub; }
			if ($url) { $url = "&lt;<A href=\"http://$url\">HOME</A>&gt;"; }
			if ($reno && !$flag) { print "<BLOCKQUOTE>\n"; $flag=1; }
			print "<FONT color=$sub_color><B>$sub</B></FONT> ���e�ҁF<B>$name</B> ���e���F$date $url <FONT color=$sub_color>No.$no2</FONT><BR>$com\n<P>";
		}
	}
	if ($flag) { print "</BLOCKQUOTE>\n"; }
	print "<HR>\n";

	# �^�C�g����
	if (!ereg("^Re:",$resub)) { $resub = "Re: $resub"; }

	print "<A name=\"RES\"></A>\n";
	if ($res_clip) {
		print "<FORM action=\"$script\" method=\"POST\" enctype=\"multipart/form-data\">\n";
	} else {
		print "<FORM action=\"$script\" method=\"POST\">\n";
	}

	echo <<<EOD
<INPUT type=hidden name=mode value="regist">
<INPUT type=hidden name=reno value="$no">
<BLOCKQUOTE>
<TABLE>
<TR>
  <TD nowrap><B>���Ȃ܂�</B></TD>
  <TD><INPUT type=text name=name value="$c_name" size=$nam_wid></TD>
</TR>
<TR>
  <TD nowrap><B>�d���[��</B></TD>
  <TD><INPUT type=text name=email value="$c_email" size=$nam_wid></TD>
</TR>
<TR>
  <TD nowrap><B>�^�C�g��</B></TD>
  <TD><INPUT type=text name=sub value="$resub" size=$sub_wid>
  <INPUT type=submit value="�ԐM����"><input type=reset value="���Z�b�g"></TD>
</TR>
<TR>
  <TD colspan=2><B>���b�Z�[�W</B><BR>
  <TEXTAREA cols=$com_wid rows=5 name=comment wrap="soft"></TEXTAREA></TD>
</TR>
<TR>
  <TD nowrap><B>�t�q�k</B></TD>
  <TD><INPUT type=text name=url value="http://$c_url" size=$url_wid></TD>
</TR>
EOD;
	if ($res_clip) {
		print "<TR><TD><B>�Y�tFile</B></TD>\n";
		print "<INPUT TYPE=hidden name=MAX_FILE_SIZE value=\"$maxdata\">\n";
		print "<TD><INPUT type=file name=upfile size=\"$sub_wid\"></TD></TR>\n";
	}
	print "<TR><TD nowrap><B>�폜�L�[</B>";
	print "<TD><INPUT type=password name=pwd size=8 maxlength=8 value=\"$c_pwd\">\n";
	print "<SMALL>(�����̋L�����폜���Ɏg�p�B�p������8�����ȓ�)</SMALL></TD></TR>\n";
	print "<TR><TD nowrap><B>�����F</B></TD><TD>\n";

	# �N�b�L�[�̐F��񂪂Ȃ��ꍇ
	if ($c_color == "") { $c_color = $COLORS[0]; }
	while (list(, $value) = each ($COLORS)) {
		if ($c_color == $value) {
			print "      <INPUT type=radio name=color value=\"$value\" checked>";
			print "<FONT color=\"$value\">��</FONT>\n";
		} else {
			print "      <INPUT type=radio name=color value=\"$value\">";
			print "<FONT color=\"$value\">��</FONT>\n";
		}
	}
	print "</TD></TR></TABLE></FORM>\n";
	print "</BLOCKQUOTE>\n";
	print "</BODY></HTML>";
	exit();
}

#--------------#
#  �Ǘ����[�h  #
#--------------#
if ($mode == "admin") {
	if ($pass == "") {
		htheader();
		print "<center><h4>�p�X���[�h����͂��ĉ�����</h4>\n";
		print "<form action=\"$script\" method=\"POST\">\n";
		print "<input type=hidden name=mode value=\"admin\">\n";
		print "<input type=hidden name=action value=\"del\">\n";
		print "<input type=password name=pass size=8>";
		print "<input type=submit value=\" �F�� \"></form>\n";
		print "</center>\n</body></html>\n";
		exit();
	}
	if ($pass != $master) { error("�p�X���[�h���Ⴂ�܂�"); }

	htheader();
	print "[<a href=\"$script?\">�f���ɖ߂�</a>]\n";
	print "<table width='100%'><tr><th bgcolor=\"#804040\">\n";
	print "<font color=\"#FFFFFF\">�Ǘ����[�h</font>\n";
	print "</th></tr></table>\n";

	# �摜����
	if ($chk) {
		# �������}�b�`���O���X�V
		$in = file($logfile);
		$top = array_shift($in);
		while (list (, $line) = each ($in))  {
			list($no,$reno,$d,$n,$m,$s,$com,$u,$ho,$p,$c,$t,$w,$h,$check) = explode("<>",$line);
			reset($chk);
			while (list(,$xx) = each($chk)) {
				if ($no == $xx) {
					$line = "$no<>$reno<>$d<>$n<>$m<>$s<>$com<>$u<>$ho<>$p<>$c<>$t<>$w<>$h<>1<>\n";
					break;
				}
			}
			$new .= $line;
		}

		# �X�V
		$new = $top.$new;
		$fp = fopen($logfile,"w");
		fputs($fp,$new);
		fclose($fp);
	}
	# �폜����
	if ($del) {
		# �폜�����}�b�`���O���X�V
		$in = file($logfile);
		$top = array_shift($in);
		while (list (, $line) = each ($in)) {
			$flag=0;
			list($no,$reno,$d,$n,$m,$s,$com,$u,$ho,$p,$c,$tail,$w,$h,$chk) = explode("<>",$line);
			reset($del);
			while (list(,$val) = each($del)) {
				if ($no == $val || $reno == $val) {
					if (file_exists ("$ImgDir$no$tail")) {
						unlink("$ImgDir$no$tail");
					}
					if (file_exists ("$ImgDir2$no$tail")) {
						unlink("$ImgDir2$no$tail"); }
					$flag=1;
					break;
				}
			}
			if ($flag == 0) {$new .= $line; }
		}

		# �X�V
		$new = $top.$new;
		$fp = fopen($logfile,"w");
		fputs($fp,$new);
		fclose($fp);
	}

	# �Ǘ���\��
	if ($page == "") { $page = 0; }
	print "<P><center><table><tr><td>\n<UL>\n";
	print "<LI>�L�����폜����ꍇ�́u�폜�v�̃`�F�b�N�{�b�N�X�Ƀ`�F�b�N�����u���M����v�������ĉ������B\n";
	print "<LI>�摜�����s�Ȃ��ꍇ�́u�摜���v�̃`�F�b�N�{�b�N�X�Ƀ`�F�b�N�����u���M����v�������ĉ������B\n";
	print "</UL>\n</td></tr></table>\n";
	print "<form action=\"$script\" method=\"POST\">\n";
	print "<input type=hidden name=mode value=\"admin\">\n";
	print "<input type=hidden name=page value=\"$page\">\n";
	print "<input type=hidden name=pass value=\"$pass\">\n";
	print "<input type=hidden name=action value=\"$action\">\n";
	print "<input type=submit value=\"���M����\">";
	print "<input type=reset value=\"���Z�b�g\">\n";
	print "<P><table border=0 cellspacing=1><tr>\n";
	print "<th nowrap>�폜</th><th nowrap>�L��NO</th><th>���e��</th>";
	print "<th>�^�C�g��</th><th>���e��</th><th>URL</th><th>�R�����g</th>";
	print "<th>�z�X�g��</th><th>�摜<br>(bytes)</th>\n";

	$line=9;
	if ($ImageCheck) { print "<th>�摜<br>����</th>"; $line=10; }

	print "</tr>\n";

	$in = file($logfile);
	$top = array_shift($in);
	$i=0;
	while (list(,$value) = each($in)) {
		$img_flag=0;
		list($no,$reno,$date,$name,$mail,$sub,$com,
			$url,$host,$pw,$color,$tail,$w,$h,$chk) = explode("<>",$value);

		if ($mail) { $name="<a href=\"mailto:$mail\">$name</a>"; }
		list($date,$dmy) = explode("\(", $date);

		if ($url) { $url = "&lt;<a href=\"http://$url\" target='_top'>Home</a>&gt;"; }
		else { $url = '-'; }

		htmlspecialchars($com);
		if (strlen($com) > 40) {
			$com = substr($com,0,38);
			$com .= "...";
		}
		if (file_exists("$ImgDir$no$tail")) {
			if ($tail == ".gif" || $tail == ".jpg" || $tail == ".png") {
				$img_flag = 1;
				$File = "�摜";
			} else { $File = "File"; }
			$clip = "<a href=\"$ImgDir$no$tail\" target='_blank'>$File</a>";
			$size = filesize ("$ImgDir$no$tail");
			$all += $size;
		} else {
			$clip = "";
			$size = 0;
		}
		if ($reno == "") { print "<tr><th colspan=$line><hr></th></tr>\n"; }

		# �`�F�b�N�{�b�N�X
		print "<tr><th><input type=checkbox name=del[] value=\"$no\"></th>";
		print "<td align=center>$no</td>";
		print "<td><small>$date</small></td><th>$sub</th><th>$name</th>";
		print "<td align=center>$url</td><td><small>$com</small></td>";
		print "<td><small>$host</small></td><td align=center>$clip<br>($size)</td>\n";
		# �摜����
		if ($ImageCheck) {
			if ($img_flag == 1 && $chk == 1) {
				print "<th>OK</th>";
			} elseif ($img_flag == 1 && $chk != 1) {
				print "<th><input type=checkbox name=chk[] value=$no></th>";
			} else {
				print "<td><br></td>";
			}
		}
		print "</tr>\n";
	}

	print "<tr><th colspan=$line><hr></th></tr>\n";
	print "</table></form>\n";

	$all = floor($all / 1024);
	print "�y�Y�t�f�[�^���� �F <b>$all</b> KB�z\n";
	print "</center>\n";
	print "</body></html>\n";
	exit();
}

#------------------#
#  ���[�U�L���폜  #
#------------------#
if ($mode == "usr_del") {
	if ($no == '' || $pwd == '')
		{ error("�L��No�܂��͍폜�L�[�����̓����ł�"); }
	$lines = file ($logfile);
	$top = array_shift($lines);

	$flag=0;
	while (list (, $line) = each ($lines)) {
		list($no2,$reno2,$date,$name,$mail,$sub,$com,
			$url,$host,$pw,$color,$tail,$w,$h,$chk) = explode("<>",$line);

		if ($flag == 0 && $no2 == $no) {
			if ($pw == '') {
				error("�Y���L���ɂ͍폜�L�[���ݒ肳��Ă��܂���");
			}
			# �폜�L�[���ƍ�
			if (crypt($pwd,$pw) != $pw) { error("�폜�L�[���Ⴂ�܂�"); }

			# �Y�t�t�@�C���폜
			if (file_exists ("$ImgDir$no$tail")) { unlink("$ImgDir$no$tail"); }
			if (file_exists ("$ImgDir2$no$tail")) { unlink("$ImgDir2$no$tail"); }
			if ($reno2 == "") { $flag=2; }
			else { $flag=1; }
		}
		elseif ($flag == 2 && $no == $reno2) {
			if (file_exists ("$ImgDir$no$tail")) { unlink("$ImgDir$no$tail"); }
			if (file_exists ("$ImgDir2$no$tail")) { unlink("$ImgDir2$no$tail"); }
			continue;
		}
		else { $new .= $line; }
	}
	if ($flag == 0) { error("�Y���L������������܂���"); }

	# �X�V
	$new = $top.$new;
	$fp = fopen ($logfile,"w");
	fputs($fp,$new);
	fclose($fp);

}

#----------------#
#  �L���C������  #
#----------------#
if ($mode == "usr_edt") {
	if ($no == '' || $pwd == '') {
		error("�L��No�܂��̓p�X���[�h�����̓����ł�");
	}

	if ($action == "edit") {
		$ref_url = urldecode ($HTTP_REFERER);
		if ($baseurl) {
			if (ereg($base_url,$ref_url)) { error("�s���ȃA�N�Z�X�ł�"); }
		}
		if ($name == "") { error("���O�����͂���Ă��܂���"); }
		if ($comment == "") { error("�R�����g�����͂���Ă��܂���"); }
		if ($in_email) {
			if ($email == "") { error("�d���[�������͂���Ă��܂���"); }
			elseif (!eregi("(.*)\@(.*)\.(.*)",$email)) {
				error("�d���[���̓��͓��e���s���ł�");
			}
		}
		$url = str_replace ("http://","", $url);
	}

	$flag=0;
	$lines = file ($logfile);
	$top = array_shift($lines);
	while (list (, $line) = each ($lines)) {
		list($no2,$reno,$date,$name2,$mail,$sub2,$com,
			$url2,$host,$pw,$color2,$tail,$w,$h,$chk) = explode("<>",$line);

		if ($no2 == $no) {
			$pw2 = $pw;
			$flag=1;
			if ($action != "edit") { break; }
			else {
				$name = htmlspecialchars ($name);
				$email = htmlspecialchars ($email);
				$url = htmlspecialchars ($url);
				$sub = htmlspecialchars ($sub);
				$comment = stripslashes($comment);
				if ($tagkey) {
					$comment = str_replace("<>","&lt;&gt;",$comment);
				}
				else {$comment = htmlspecialchars ($comment);}
				$comment = str_replace (array("\r\n","\r","\n"),"<BR>",$comment);
				$line = "$no<>$reno<>$date<>$name<>$email<>$sub<>$comment<>$url<>$host<>$pw<>$color<>$tail<>$w<>$h<>$chk<>\n";
			}
		}
		if ($action == "edit") { $new .= $line; }
	}
	if (!$flag) { error("�Y���̋L������������܂���"); }
	if ($pw2 == "") { error("�p�X���[�h���ݒ肳��Ă��܂���"); }
	if (crypt($pwd,$pw2) != $pw2) { error("�p�X���[�h���Ⴂ�܂�"); }

	if ($action == "edit") {
		$new = $top.$new;
		$fp = fopen ($logfile,"w");
		fputs($fp,$new);
		fclose($fp);

		$cookval = implode(",", array($name,$email,$url,$pwd,$color));
		setcookie ("JOYFUL", $cookval,time()+60*24*3600);
	
		if ($url) { $url = "<A href=\"http://$url\" target=\"_top\">http://$url</A>"; }
		if ($email) { $email = "<A href=\"mailto:$email\">$email</A>"; }

		htheader();
		print "<DIV align=center>\n";
		print "<B>- �ȉ��̂Ƃ���C�����������܂��� -</B>\n";
		print "<P><TABLE border=1 cellpadding=10 width='85%'><TR><TD bgcolor=\"$tbl_color\">\n";
		print "���Ȃ܂��F<B>$name</B><BR>\n";
		print "�d���[���F$email<BR>\n";
		print "��@���F<B>$sub</B><BR>\n";
		print "�t�q�k�F$url</BR><BR>\n";
		print "<FONT color=\"$color\">$comment</FONT>\n";
		print "</TD></TR></TABLE>\n";
		print "<P><FORM action=\"$script\">\n";
		print "<INPUT type=submit value='���X�g�ɖ߂�'></FORM>\n";
		print "</DIV>\n</BODY>\n</HTML>\n";
		exit();
	}
	$com = str_replace("<BR>","\n",$com);
	htheader();
	echo <<<EOD
<B>- �ύX���镔���̂ݏC�����đ��M�{�^���������ĉ����� -</B>
<P><FORM action="$script" method="POST">
<INPUT type=hidden name=mode value="usr_edt">
<INPUT type=hidden name=action value="edit">
<INPUT type=hidden name=pwd value="$pwd">
<INPUT type=hidden name=no value="$no">
<TABLE border=0 cellspacing=0 cellpadding=1>
<TR>
  <TD nowrap><B>���Ȃ܂�</B></TD>
  <TD><INPUT type=text name=name size="$nam_wid" value="$name2"></TD>
</TR>
<TR>
  <TD nowrap><B>�d���[��</B></TD>
  <TD><INPUT type=text name=email size="$nam_wid" value="$mail"></TD>
</TR>
<TR>
  <TD nowrap><B>��@�@��</B></TD>
  <TD>
    <INPUT type=text name=sub size="$sub_wid" value="$sub2"> 
    <INPUT type=submit value="���M����"><INPUT type=reset value="���Z�b�g">
  </TD>
</TR>
<TR>
  <TD colspan=2>
    <B>�R�����g</B><BR>
    <TEXTAREA cols="$com_wid" rows=7 name=comment wrap=soft>$com</TEXTAREA>
  </TD>
</TR>
<TR>
  <TD nowrap><B>�t�q�k</B></TD>
  <TD><input type=text size="$url_wid" name=url value="http://$url2"></TD>
</TR>
EOD;

	print "<TR><TD nowrap><B>�����F</B></TD><TD>\n";
	while (list(, $value) = each ($COLORS)) {
		if ($color2 == $value) {
			print "      <INPUT type=radio name=color value=\"$value\" checked>";
			print "<FONT color=\"$value\">��</FONT>\n";
		} else {
			print "      <INPUT type=radio name=color value=\"$value\">";
			print "<FONT color=\"$value\">��</FONT>\n";
		}
	}
	print "</TABLE></FORM></CENTER>\n</BODY>\n</HTML>\n";
	exit();
}

#----------------------------#
#  �f���̎g�������b�Z�[�W  #
#----------------------------#
if ($mode == "howto") {
	if ($tagkey == 0) { $tag_msg = "���e���e�ɂ́A<B>�^�O�͈�؎g�p�ł��܂���B</B>\n"; }
	else { $tag_msg = "�R�����g���ɂ́A<B>�^�O�g�p�����邱�Ƃ��ł��܂��B</B>\n"; }
	if ($in_email) {
		$eml_msg = "�L���𓊍e�����ł̕K�{���͍��ڂ�<B>�u���Ȃ܂��v�u�d���[���v�u���b�Z�[�W�v</B>�ł��B�t�q�k�A�薼�A�폜�L�[�͔C�ӂł��B";
	} else {
		$eml_msg = "�L���𓊍e�����ł̕K�{���͍��ڂ�<B>�u���Ȃ܂��v</B>��<B>�u���b�Z�[�W�v</B>�ł��B�d���[���A�t�q�k�A�薼�A�폜�L�[�͔C�ӂł��B";
	}

	$maxkb = floor($maxdata/1024);
	if ($gif) { $FILE .= "GIF, "; }
	if ($jpeg) { $FILE .= "JPEG, "; }
	if ($png) { $FILE .= "PNG, "; }
	if ($text) { $FILE .= "TEXT, "; }
	if ($lha) { $FILE .= "LHA, "; }
	if ($zip) { $FILE .= "ZIP, "; }
	if ($pdf) { $FILE .= "PDF, "; }
	if ($midi) { $FILE .= "MIDI, "; }
	if ($msword) { $FILE .= "WORD, "; }
	if ($excel) { $FILE .= "EXCEL, "; }
	if ($ppt) { $FILE .= "POWERPOINT, "; }
	if ($rm) { $FILE .= "RM, "; }
	if ($ram) { $FILE .= "RAM, "; }
	if ($mpeg) { $FILE .= "MPEG, "; }
	if ($mp3) { $FILE .= "MP3, "; }
	$FILE = substr($FILE,0,strlen($FILE)-2);

	htheader();
	echo <<<EOD
[<A href="$script?">�f���ɂ��ǂ�</A>]
<TABLE width="100%">
<TR><TH bgcolor="#880000">
  <FONT color="#FFFFFF">�f���̗��p��̒���</FONT>
</TH></TR></TABLE>
<P><CENTER>
<TABLE width="90%" border=1 cellpadding=10>
<TR><TD bgcolor="$tbl_color">
<OL>
<LI>���̌f����<B>�N�b�L�[�Ή�</B>�ł��B�P�x�L���𓊍e���������ƁA���Ȃ܂��A�d���[���A�t�q�k�A�폜�L�[�̏��͂Q��ڈȍ~�͎������͂���܂��B�i���������p�҂̃u���E�U���N�b�L�[�Ή��̏ꍇ�j<P>
<LI>�摜�Ȃǂ̃o�C�i���[�t�@�C�����A�b�v���[�h���邱�Ƃ��\�ł��B
<P>
  <UL>
  <LI>�Y�t�\�t�@�C�� : $FILE
  <LI>�ő哊�e�f�[�^�� : $maxkb KB
  <LI>�摜�͉� $MaxW �s�N�Z���A�c $MaxH �s�N�Z���𒴂���Ək���\������܂��B
  </UL>
<P>
<LI>$tag_msg<P>
<LI>$eml_msg<P>
<LI>�L���ɂ́A<B>���p�J�i�͈�؎g�p���Ȃ��ŉ������B</B>���������̌����ƂȂ�܂��B<P>
<LI>�L���̓��e����<B>�u�폜�L�[�v</B>�Ƀp�X���[�h�i�p������8�����ȓ��j�����Ă����ƁA���̋L���͎���<B>�폜�L�[</B>�ɂ���č폜���邱�Ƃ��ł��܂��B<P>
<LI>�L���̕ێ�������<B>�ő� $max ��</B>�ł��B����𒴂���ƌÂ����Ɏ����폜����܂��B<P>
<LI>�����̋L����<B>�u�ԐM�v</B>�����邱�Ƃ��ł��܂��B�e�L���̏㕔�ɂ���<B>�u�ԐM�v</B>�{�^���������ƕԐM�p�t�H�[��������܂��B<P>
<LI>�ߋ��̓��e�L������<B>�u�L�[���[�h�v�ɂ���ĊȈՌ������ł��܂��B</B>�g�b�v���j���[��<A href="$script?mode=find">�u���[�h�����v</A>�̃����N���N���b�N����ƌ������[�h�ƂȂ�܂��B<P>
<LI>�Ǘ��҂��������s���v�Ɣ��f����L���⑼�l���排�������L���͗\���Ȃ��폜���邱�Ƃ�����܂��B
</OL>
</TD></TR></TABLE>
</CENTER>
</BODY>
</HTML>
EOD;
	exit();
}

#------------#
#  �ߋ����O  #
#------------#
if ($mode == "past") {
	$no = file($nofile);
	$pastno = $no[0];

	if (!$pastlog) { $pastlog = $pastno; }

	htheader();
	echo <<<EOD
[<A href="$script?">�f���ɖ߂�</A>]
<TABLE width="100%"><TR><TH bgcolor="#880000">
  <FONT color="#FFFFFF">�ߋ����O[$pastlog]</FONT>
</TH></TR></TABLE>
<P><TABLE border=0><TR><TD>
<FORM action="$script" method="POST">
<INPUT type=hidden name="mode" value="past">
�ߋ����O�F<SELECT name="pastlog">
EOD;

	$pastkey = $pastno;
	while ($pastkey > 0) {
		if ($pastlog == $pastkey) {
			print "<OPTION value=\"$pastkey\" selected>$pastkey Page\n";
		} else {
			print "<OPTION value=\"$pastkey\">$pastkey Page\n";
		}
		$pastkey--;
	}
	print "</SELECT>\n<INPUT type=submit value='�ړ�'></TD></FORM>\n";
	print "<TD width=30></TD><TD>\n";
	print "<FORM action=\"$script\" method=\"POST\">\n";
	print "<INPUT type=hidden name=mode value=past>\n";
	print "<INPUT type=hidden name=pastlog value=\"$pastlog\">\n";
	print "���[�h�����F<INPUT type=text name=word size=30 value=\"$word\">\n";
	print "�����F<SELECT name=cond>\n";
	$a = array("AND", "OR");
	while (list(,$value) = each ($a)) {
		if ($cond == $value) {
			print "<OPTION value=\"$value\" selected>$value\n";
		} else {
			print "<OPTION value=\"$value\">$value\n";
		}
	}
	print "</SELECT>\n";
	print "�\���F<SELECT name=view>\n";
	if ($view == "") { $view = $p_log; }
	$a = array (5,10,15,20,25,30);
	while (list(,$value) = each($a)) {
		if ($view == $value) {
			print "<OPTION value=\"$value\" selected>$value ��\n";
		} else {
			print "<OPTION value=\"$value\">$value ��\n";
		}
	}
	print "</SELECT>\n<INPUT type=submit value='����'></TD></FORM>\n";
	print "</TR></TABLE>\n";

	# �\�����O���`
	$file = "$pastdir$pastlog.dat";
	if ($page == "") { $page = 0; }
	# ���[�h��������
	if ($word != "") {
		$word = str_replace("�@"," ",$word);
		$word = ereg_replace("[[:space:]]+"," ",$word);
		$word = ltrim($word);
		$pairs = explode(" ", $word);
		$in = file($file);
		while (list (,$line) = each($in)) {
			$flag=0;
			reset($pairs);
			while (list(,$value)  = each ($pairs)) {
				if (strpos($line,$value,0)) {
					$flag=1;
					if ($cond == 'OR') { break; }
				} else {
					if ($cond == 'AND') { $flag=0; break; }
				}
			}
			if ($flag) { $new[] = $line; }
		}

		$count = count($new);
		print "�������ʁF<B>$count</B>��\n";
		$end_data = count($new) - 1;
		$page_end = $page + $view - 1;
		if ($page_end >= $end_data) { $page_end = $end_data; }

		$next_line = $page_end + 1;
		$back_line = $page - $view;

		$enwd = urlencode($word);
		if ($back_line >= 0) {
			print "[<A href=\"$script?mode=past&page=$back_line&word=$enwd&view=$view&cond=$cond&pastlog=$pastlog\">�O�� $view ��</A>]\n";
		}
		if ($page_end != "$end_data") {
			print "[<A href=\"$script?mode=past&page=$next_line&word=$enwd&view=$view&cond=$cond&pastlog=$pastlog\">���� $view ��</A>]\n";
		}
		# �\���J�n
		$i = $page;
		while ($i <= $page_end) {
			print $new[$i];
			$i ++;
		}
		print "<HR>\n</BODY></HTML>\n";
		exit();
	}

	# �y�[�W��؂菈��
	$start = $page + 1;
	$end   = $page + $p_log;

	$i=0;
	$in = file($file);
	while (list(,$line) = each($in)) {
		$flag=0;
		if (eregi("^<hr>\[<b>[0-9]+\<\/b\>\]",$line)) { $flag=1; $i++; }
		if ($i < $start) { continue; }
		if ($i > $end) { break; }

		if ($flag) { print $line; }
		else {
			$line = eregi_replace("<hr>","",$line);
			print "<BLOCKQUOTE>$line</BLOCKQUOTE>\n";
		}
	}
	print "<HR>\n";

	$next_page = $page + $p_log;
	$back_page = $page - $p_log;

	print "<TABLE>\n";
	if ($back_page >= 0) {
		print "<TD><FORM action=\"$script\" method=\"POST\">\n";
		print "<INPUT type=hidden name=mode value=past>\n";
		print "<INPUT type=hidden name=pastlog value=\"$pastlog\">\n";
		print "<INPUT type=hidden name=page value=\"$back_page\">\n";
		print "<INPUT type=submit value=\"�O�� $p_log ��\">\n";
		print "</TD></FORM>\n";
	}
	if ($next_page < $i) {
		print "<TD><FORM action=\"$script\" method=\"POST\">\n";
		print "<INPUT type=hidden name=mode value=past>\n";
		print "<INPUT type=hidden name=pastlog value=\"$pastlog\">\n";
		print "<INPUT type=hidden name=page value=\"$next_page\">\n";
		print "<INPUT type=submit value=\"���� $p_log ��\">\n";
		print "</TD></FORM>\n";
	}
	print "</TABLE>\n</BODY>\n</HTML>\n";
	exit();
}

#------------------#
#  ���[�h��������  #
#------------------#
if ($mode =="find") {
	htheader();
	echo <<<EOD
[<A href="$script?">�f���ɂ��ǂ�</A>]
<TABLE width="100%">
<TR><TH bgcolor="#880000">
  <FONT color="#FFFFFF">���[�h����</FONT>
</TH></TR></TABLE>
<P>
<UL>
  <LI>����������<B>�L�[���[�h</B>����͂��A�u�����v�u�\���v��I�����āu�����v�{�^���������ĉ������B
  <LI>�L�[���[�h�́u���p�X�y�[�X�v�ŋ�؂��ĕ����w�肷�邱�Ƃ��ł��܂��B
<P><FORM action="$script" method="POST">
<INPUT type="hidden" name="mode" value="find">
�L�[���[�h�F<INPUT type="text" name="word" size="30" value="$word">
�����F<SELECT name="cond">
EOD;
	if (!$cond) { $cond = "AND"; }
	$a = array("AND", "OR");
	while (list(,$value) = each ($a)) {
		if ($cond == $value) {
			print "<OPTION value=\"$value\" selected>$value\n";
		} else {
			print "<OPTION value=\"$value\">$value\n";
		}
	}
	print "</SELECT>\n";
	print "�\���F<SELECT name=\"view\">\n";
	if ($view == "") { $view = $p_log; }
	$a = array (5,10,15,20);
	while (list(,$value) = each($a)) {
		if ($view == $value) {
			print "<OPTION value=\"$value\" selected>$value ��\n";
		} else {
			print "<OPTION value=\"$value\">$value ��\n";
		}
	}
	print "</SELECT>\n";
	print "<INPUT type=\"submit\" value=\"����\"></FORM>\n</UL>\n";

	# ���[�h�����̎��s�ƌ��ʕ\��
	if ($word != "") {

		# ���͓��e�𐮗�
		$word = str_replace("�@"," ",$word);
		$word = ereg_replace("[[:space:]]+"," ",$word);
		$word = ltrim($word);
		$pairs = explode(" ", $word);
		
		# �t�@�C����ǂݍ���
		$in = file($logfile);
		$top = array_shift($in);
		while (list(,$line) = each($in)) {
			$flag=0;
			reset($pairs);
			while (list(,$value)  = each ($pairs)) {
				if (strpos($line,$value,0)) {
					$flag=1;
					if ($cond == 'OR') { break; }
				} else {
					if ($cond == 'AND') { $flag=0; break; }
				}
			}
			if ($flag) { $new[] = $line; }
		}
		
		# �����I��
		$count = count($new);
		print "�������ʁF<B>$count</B>��\n";
		if ($page == '') { $page = 0; }
		$end_data = count($new) - 1;
		$page_end = $page + $view - 1;
		if ($page_end >= $end_data) { $page_end = $end_data; }

		$next_line = $page_end + 1;
		$back_line = $page - $view;

		$enwd = urlencode($word);
		if ($back_line >= 0) {
			print "[<A href=\"$script?mode=find&page=$back_line&word=$enwd&view=$view&cond=$cond\">�O�� $view ��</A>]\n";
		}
		if ($page_end != "$end_data") {
			print "[<A href=\"$script?mode=find&page=$next_line&word=$enwd&view=$view&cond=$cond\">���� $view ��</A>]\n";
		}
		print "[<A href=\"$script?mode=find\">������蒼��</A>]\n";

		$i = $page;
		while ($i <= $page_end) {
			list($no,$reno,$date,$name,$email,$sub,$com,$url) = explode("<>", $new[$i]);
			if ($email) { $name = "<A href=\"mailto:$email\">$name</A>"; }
			if ($url) { $url = "&lt;<A href=\"http://$url\" target='_top'>HOME</A>&gt;"; }
			if ($reno) { $no = "$reno�ւ̃��X"; }

			# ���ʂ�\��
			print "<HR>[<B>$no</B>] <FONT color=\"$sub_color\"><B>$sub</B></FONT>";
			print " ���e�ҁF<B>$name</B> <SMALL>���e���F$date</SMALL> $url<BR>\n";
			print "<BLOCKQUOTE>$com</BLOCKQUOTE>\n";
			$i ++;
		}
		print "<HR>\n";
	}
	print "</BODY></HTML>\n";
	exit();
}

#--------------#
#  �L���\����  #
#--------------#
htheader();
#  �J�E���^����
if ($counter){
	# �{�����̂݃J�E���g�A�b�v
	if ($mode == '') { $cntup=1; } else { $cntup=0; }

	# �J�E���g�t�@�C����ǂ݂���
	$in = file($cntfile);
	$data = $in[0];

	# IP�`�F�b�N�ƃ��O�j���`�F�b�N
	list($cnt, $ip) = explode(":", $data);
	if ($REMOTE_ADDR == $ip || $cnt == "") { $cntup=0; }

	# �J�E���g�A�b�v
	if ($cntup) {
		$cnt++;
		$fp = fopen($cntfile,"w");
		fputs ($fp,"$cnt:$REMOTE_ADDR");
		fclose($fp);
	}

	# ��������
	$format = "%0".$mini_fig."d";
	$cnt = sprintf("$format",$cnt);

	# GIF�J�E���^�\��
	if ($counter == 2) {
		for($i = 0; $i < $mini_fig; $i++) {
			$cnts = substr($cnt, $i, 1);
			print "<IMG src=\"$gif_path$cnts.gif\" alt=\"$cnts\" width=\"$mini_w\" height=\"$mini_h\">";
		}
	}
	# �e�L�X�g�J�E���^�\��
	else {
		print "<FONT color=\"$cnt_color\" face=\"verdana,Times New Roman,Arial\">$cnt</FONT><br>\n";
	}
}
print "<CENTER>\n";
if ($banner1 != "<!-- �㕔 -->") { print "$banner1\n"; }
if ($title_gif == '') {
	print "<B style=\"font-size: $t_size; color:$t_color; face:'$face'\">$title</B>\n";
} else {
	print "<IMG src=\"$title_gif\" width=\"$tg_w\" height=\"$tg_h\" alt=\"$title\">\n";
}
echo <<<EOD
<HR>
[<A href="$homepage" target='_top'>�g�b�v�ɖ߂�</A>]
[<A href="$script?mode=howto">�g������</A>]
[<A href="$script?mode=find">���[�h����</A>]
EOD;
# �ߋ����O�̃����N����\��
if ($pastkey) { print "[<A href=\"$script?mode=past\">�ߋ����O</A>]\n"; }
echo <<<EOD
[<A href="$script?mode=admin">�Ǘ��p</a>]
<HR></CENTER><BR>
EOD;
/* form */
echo <<<EOD
<FORM action="$script" method="POST" enctype="multipart/form-data">
<INPUT type=hidden name=mode value="regist">
<TABLE border=0 cellspacing=0>
<TR>
  <TD nowrap><B>���Ȃ܂�</B></TD>
  <TD><INPUT type=text name=name size="$nam_wid" value="$c_name"></TD>
</TR>
<TR>
  <TD nowrap><B>�d���[��</B></TD>
  <TD><INPUT type=text name=email size="$nam_wid" value="$c_email"></TD>
</TR>
<TR>
  <TD nowrap><B>��@�@��</B></TD>
  <TD nowrap>
    <INPUT type=text name=sub size="$sub_wid" value="">
	<INPUT type=submit value="���e����"><INPUT type=reset value="���Z�b�g">
  </TD>
</TR>
<TR>
  <TD colspan=2>
    <B>�R�����g</B><BR>
    <TEXTAREA cols="$com_wid" rows=7 name=comment wrap="soft"></TEXTAREA>
  </TD>
</TR>
<TR>
  <TD nowrap><B>�t�q�k</B></TD>
  <TD><INPUT type=text size="$url_wid" name=url value="http://$c_url"></TD>
</TR>
<TR>
  <TD><B>�Y�tFile</B></TD>
  <INPUT TYPE=hidden name=MAX_FILE_SIZE value="$maxdata">
  <TD><INPUT type=file name=upfile size="$sub_wid"></TD>
  </TR>
<TR>
  <TD nowrap><B>�폜�L�[</B></TD>
  <TD><INPUT type=password name=pwd size=9 maxlength=8 value="$c_pwd"><SMALL>(�����̋L�����폜���Ɏg�p�B�p������8�����ȓ�)</SMALL></TD>
</TR>
<TR>
  <TD nowrap><B>�����F</B></TD>
  <TD>
EOD;
if ($c_color == "") { $c_color = $COLORS[0]; }
while (list(, $value) = each ($COLORS)) {
	if ($c_color == $value) {
		print "      <INPUT type=radio name=color value=\"$value\" checked>";
		print "<FONT color=\"$value\">��</FONT>\n";
	} else {
		print "      <INPUT type=radio name=color value=\"$value\">";
		print "<FONT color=\"$value\">��</FONT>\n";
	}
}
print "</TD></TR></TABLE></FORM>";
if ($ImageCheck) {
	print "�E�摜�͊Ǘ��҂�������܂ŁuCOMING SOON�v�̃A�C�R�����\������܂��B<BR>\n";
}
print "<CENTER><BR>\n";
# �y�[�W��؂菈��
$start = $page + 1;
$end   = $page + $p_log;
$in = file("$logfile");
$top = array_shift ($in);
$i=0;
$flag=0;
while (list (, $line) = each ($in)) {
	list($no,$reno,$date,$namae,$mail,$sub,$comment,
		$url2,$host,$pw,$color2,$tail,$w,$h,$chk) = explode("<>",$line);
	if ($reno == "") { $i++; }
	if ($i < $start) { continue; }
	if ($i > $end) { continue; }
	if (strlen($sub) > $sub_len*2) {
		$sub = substr($sub,0,$sub_len*2);
		$sub .= "...";
	}
	if ($mail) { $namae = "<A href=\"mailto:$mail\">$namae</A>"; }
	if ($home_icon && $url2) { $url2 = "<A href=\"http://$url2\" target='_blank'><IMG src=\"$ImgDir$IconHome\" border=0 align=top alt='HomePage'></A>"; }
	elseif (!$home_icon && $url2) { $url2 = "&lt;<A href=\"http://$url2\" target='_blank'>HOME</A>&gt;"; }
	if (!$reno && $flag) {
		print "</TD></TR></TABLE><BR><BR>\n";
		$flag=1;
	}
	if (!$reno) {
		print "<TABLE border=1 width='100%' bgcolor=\"$tbl_color\" cellspacing=0 cellpadding=2><TR><TD>\n";
		$flag=1;
	}
	if ($reno) { print "<HR noshade size=1 width='90%'>\n"; }
	print "<TABLE border=0 cellpadding=2><TR>\n";
	if ($reno) { print "<TD rowspan=2 width=40><BR></TD>"; }
	print "<TD valign=top nowrap><FONT color=\"$sub_color\"><B>$sub</B></FONT>�@";
	if (!$reno) { print "���e�ҁF<B>$namae</B> <SMALL>���e���F$date</SMALL> "; }
	else { print "<B>$namae</B> - <SMALL>$date</SMALL> "; }
	print "<FONT color=\"$sub_color\"><SMALL>No.$no</SMALL></FONT></TD>";
	print "<TD valign=top nowrap> &nbsp; $url2 </TD><TD valign=top>\n";
	if (!$reno) {
		print "<FORM action=\"$script\" method=POST>\n";
		print "<INPUT type=hidden name=mode value=res>\n";
		print "<INPUT type=hidden name=no value=$no>\n";
		print "<INPUT type=submit value='�ԐM'></TD></FORM>\n";
	} else {
		print "<BR></TD>\n";
	}
	print "</TR></TABLE><TABLE border=0 cellpadding=5><TR>\n";
	if ($reno) { print "<TD width=32><BR></TD>\n"; }
	print "<TD>";
	if (!$reno) { print "<BLOCKQUOTE>\n"; }
	# ���������N
	if ($autolink) { $comment = auto_link($comment); }
	if (is_file("$ImgDir$no$tail")) {
		if ($tail == ".gif" || $tail == ".jpg" || $tail == ".png") {
			if ($ImageCheck && $chk != 1) {
				print "<P><IMG src=\"$ImgDir$IconSoon\">\n";
			} elseif (($w < $MaxW) && ($h < $MaxH)) {
				print "<P><A href=\"$ImgDir$no$tail\" target='_blank'><IMG src=\"$ImgDir$no$tail\" width=$w height=$h border=0 align=left hspace=18></A>\n";
			} else {
				print "<P><A href=\"$ImgDir$no$tail\" target='_blank'><IMG src=\"$ImgDir2$no$tail\" border=0 align=left hspace=18></A>\n";
			}
		} else {
			print "<P><A href=\"$ImgDir$no$tail\"><IMG src=\"$ImgDir$IconClip\" border=0 alt='Download:$no$tail'></A> <B>$no$tail</B>\n";
		}
	}
	print "<FONT color=\"$color2\">$comment</FONT>";
	if (!$reno) { print "</BLOCKQUOTE>\n"; }
	print "</TD></TR></TABLE>\n";
}
print "</TD></TR></TABLE></CENTER>\n";

$next = $page + $p_log;
$back = $page - $p_log;

$p_flag=0;
print "<P><BLOCKQUOTE><TABLE cellpadding=0 cellspacing=0><TR>\n";
if ($back >= 0) {
	$p_flag=1;
	print "<TD><FORM action=\"$script\" method=\"POST\">\n";
	print "<INPUT type=hidden name=page value=\"$back\">\n";
	print "<INPUT type=submit value=\"�O�� $p_log ��\"></TD></FORM>\n";
}
if ($next < $i) {
	$p_flag=1;
	print "<TD><FORM action=\"$script\" method=\"POST\">\n";
	print "<INPUT type=hidden name=page value=\"$next\">\n";
	print "<INPUT type=submit value=\"���� $p_log ��\"></TD></FORM>\n";
}
# �y�[�W�ړ��{�^���\��
if ($p_flag) {
	print "<TD width=10></TD><TD>[���ڈړ�]\n";
	$x=1;
	$y=0;
	while ($i > 0) {
		if ($page == $y) { print "<B>[$x]</B>\n"; }
		else { print "[<A href=\"$script?page=$y\">$x</A>]\n"; }
		$x++;
		$y = $y + $p_log;
		$i = $i - $p_log;
	}
	print "</TD>\n";
}
echo <<<EOD
</TR></TABLE></BLOCKQUOTE>
<DIV align=center>
<FORM action="$script" method="POST">
<FONT color=$t_color><SMALL>- �ȉ��̃t�H�[�����玩���̓��e�L�����C���E�폜���邱�Ƃ��ł��܂� -</SMALL></FONT><BR>
���� <SELECT name=mode>
<OPTION value=usr_edt>�C��
<OPTION value=usr_del>�폜</select>
�L��No <INPUT type=text name=no size=3>
�p�X���[�h <INPUT type=password name=pwd size=4 maxlength=8>
<INPUT type=submit value="���M"></FORM>
$banner2
<!-- ���쌠�\�����i�폜���ϕs�j-->
<P><SMALL><!-- $ver -->
- <A href="http://www.kent-web.com/" target="_top">Joyful Note</A> -<BR>
- <A href="http://script.s16.xrea.com/" target="_top">php+gd resize</A> -
</SMALL></P></DIV>
</BODY></HTML>
EOD;
exit();
?>
